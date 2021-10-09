# php-docker-nginx-postgresql

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

## Container structures

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):8.0-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.1

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.20-alpine
  - [node](https://hub.docker.com/_/node):16-alpine

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0
