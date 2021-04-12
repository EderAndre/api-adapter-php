# PHP API adapter

**Built with:**
- Docker
- PHP 7.4
- Mezzio
- Laminas
- Swagger-PHP


## Getting Started


If you are going to develop in an ongoing project see:


Or to start a project from scratch:

Clone this project

Define environment variables in /config/.env file. See a example in config/sample.env

Start your dev environment with docker-compose

```bash
$ cd docker/dev
$ docker-compose up -d
```

This one build container sample (php, port 80) 

After attach/exec sample container and execute composer:

LINUX

```bash
$ sudo docker exec -it sample /bin/bash
```

Windows

```bash
$ winpty docker exec -it sample bash
```

And in container

```bash
$ composer install
$ composer run --timeout=0 serve 
(or )
$ composer serve
```


service api client

```bash
X-API-CLIENT : <<your_client_test_name in .env AUTH_API_USER>>
X-API-KEY :<<secrete_in_.env_hashed php AUTH_API_HASH>>
```
**Now use POSTMAN or similar tool**

- Api client credential client_test

`Acces example endpoint to client api ` *http://localhost/api/v1/audiencias


## Tasks defined in composer

- `composer install` - Install all dependencies of the project
- `composer update` - Update/install dependencies of the project
- `composer check` - Run the task that to validate PSR-2 and tests
- `composer cs-check` - Validate the PSR-2 code indent
- `composer fix` - Fix code indent to the PSR-2
- `composer serve` - Run built-in server
- `composer test` - Run tests
- `composer test-coverage` - Run the code coverage report, generate html in *build/reports/coverage/index.html*
- `composer generate-swagger` - Generate api documention based on OpenAPI with Swagger-PHP in [http://localhost/swagger/](http://localhost/swagger/)



