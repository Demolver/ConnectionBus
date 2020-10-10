## Description

This test task has completed using PHP7.4, Symfony5.1, PHPUnit and Docker.

#Deploy and command start

Using Docker.

1) Go to project folder.

2) Run: `docker-compose up -d --build`

3) Run composer `docker-compose exec services-php composer install`

4) Crete .env using .env.example

5) Got to `http://127.0.0.1:81/api/doc`. Swagger documentation.

Execute test `docker-compose exec services-php composer test`
Execute fixer `docker-compose exec services-php composer fix`
Execute linter `docker-compose exec services-php composer lint`
