<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'php-docker-nginx-postgresql');

// Project repository
// set('repository', 'git@github.com:tokku5552/php-docker-nginx-postgresql.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

// host('project.com')
//     ->set('deploy_path', '~/{{application}}');    
    
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
task('set_release_path',function() {
    $newReleasePath = get('release_path') . '/src';
  set('release_path', $newReleasePath);
});