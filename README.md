# php-docker-nginx-postgresql

this repository is based [ucan-lab/docker-laravel](https://github.com/ucan-lab/docker-laravel)
<!-- ![License](https://img.shields.io/github/license/ucan-lab/docker-laravel?color=f05340)
![Stars](https://img.shields.io/github/stars/ucan-lab/docker-laravel?color=f05340)
![Issues](https://img.shields.io/github/issues/ucan-lab/docker-laravel?color=f05340)
![Forks](https://img.shields.io/github/forks/ucan-lab/docker-laravel?color=f05340) -->

## Introduction

Build a simple laravel development environment with docker-compose.

## Usage

```bash
$ git clone git@github.com:tokku5552/php-docker-nginx-postgresql.git
$ cd php-docker-nginx-postgresql
$ make create-project # Install the latest Laravel project
$ make install-recommend-packages # Optional
```

http://localhost

## Tips

- Read this [Makefile](https://github.com/tokku5552/php-docker-nginx-postgresql/blob/main/Makefile).
- [最強のLaravel開発環境をDockerを使って構築する](https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4#%E5%9F%BA%E6%9C%AC)

- コンテナを作成する
```
make up
``` 

- コンテナを破棄する
```
make down
```

- コンテナを再作成する
```
make restart
```

- コンテナ、イメージ、ボリュームを破棄する
```
make destroy
```

- コンテナ、ボリュームを破棄する
```
make destroy-volumes
```

- コンテナ、イメージ、ボリュームを破棄して再構築
```
make remake
```

- appコンテナに入る
```
make app
```

- webコンテナに入る
```
make web
```

- dbコンテナに入る
```
make db
```

- dbコンテナのMySQLに接続する
```
make sql
```

- dbコンテナのPostgreSQLに接続する
```
make psql
```

## Container structures

```bash
├── app
├── web
└── db
```

### app container

- [php](https://hub.docker.com/_/php):8.0-fpm-bullseye
- [composer](https://hub.docker.com/_/composer):2.1

### web container

- [nginx](https://hub.docker.com/_/nginx):1.20-alpine
- [node](https://hub.docker.com/_/node):16-alpine

### db container

- [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0
