# Symfony + Docker product shop template 🐳

## Install & start

Start app is extremly simple with Docker, to build image and execute it run this commands:

```
docker-compose up
docker-compose exec php bash
```

### What's inside

- PHP 8.1 (BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML)
- MySQL 8
- Composer 2
- Symfony 6
- Node / Npm

### Packages included 

- fixtures-bundle
- easyadmin
- php-jwt
- league/csv
- api-doc-bundle
- cors-bundle
- aws-sdk-php

### Entities and others

- Product entity
- Admin entity
- User entity
- Product fixture
- Admin create command
- Index controller
- Login template

### Install backend

```
cp .env.test .env
composer install
bin/console doctrine:schema:update --force
bin/console --no-interaction assets:install
bin/console --no-interaction cache:clear
```

### Install frontend

```
npm install
npm run build 
```

### Load fixtures and create admin

```
bin/console doctrine:fixtures:load
bin/console app:admin-create username password
```

### Runing tests


```
bin/phpunit 
```

## Start on development mode

After all app is installed you can find it in browser on http://localhost

```
docker-compose exec php bash
npm run watch
# Check all available routes
bin/console debug:router
```


## Secrets

### deploy
```
DEPLOY_PWD - project destination folder (ex. /var/www/site)
DEPLOY_KEY - your LOCAL machine id_rsa (NOT! id_rsa.pub, you need to add this key on server (ssh-copy-id))
HOST - server IP address
USER - user name
```
### enviroment
```
ENV_SECRET - app secret
ENV_DB_URL - db url
ENV_API_URL - api endpoint url
```

## Deploy

This repository is configured automatic deploy on push or pull request to the master branch. 
It deploys in two steps:

### 1. tests.yml 

load all dependences, install composer, load schema, load fixtures, migrations and finally run tests

### 2. main.yml 

_run only if tests.yml complete successfully_
copy all files to remote server (get server connection vars from repository secrets)
create .env file and run build commands
