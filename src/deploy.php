<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'php-docker-nginx-postgresql');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

inventory('servers.yml');

// Tasks

task('build', function () {
  run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

after('deploy:update_code', 'set_release_path');
task('set_release_path', function () {
  $newReleasePath = get('release_path') . '/src';
  set('release_path', $newReleasePath);
});

before('deploy:info', 'deregister-targets');
task('deregister-targets', function () {
  runLocally('aws elbv2 deregister-targets --target-group-arn {{target_group_arn}} --targets Id={{instance_id}}');
});

after('deploy:unlock', 'register-targets');
task('register-targets', function () {
  runLocally('aws elbv2 register-targets --target-group-arn {{target_group_arn}} --targets Id={{instance_id}},Port=80 ');
});

after('register-targets', 'describe-target-health');
task('describe-target-health', function () {
  $retry_count = 10;
  $i = 0;
  while ($i <= $retry_count) {
    $result = runLocally('aws elbv2 describe-target-health --target-group-arn {{target_group_arn}}');
    $obj = json_decode($result);
    foreach ($obj->TargetHealthDescriptions as $val) {
      if ($val->Target->Id === get('instance_id')) {
        if ($val->TargetHealth->State != 'healthy') {
          if ($i == $retry_count) {
            writeln('The preparation was not completed. Please try later');
            exit(1);
          }
          writeln('waiting...');
          break;
        } else {
          writeln('{{instance_id}} is healthy');
          return;
        };
      } else {
        break;
      }
    }
    sleep(1);
    $i++;
  }
});
