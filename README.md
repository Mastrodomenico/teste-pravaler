# Teste PRAVALER

# Instalação

- composer install
- configure o banco no .env
- php artisan migrate
- npm i


### Installation

Requisitos: PHP 7.2 e NODE instalados

Rode os comandos:

```sh
$ composer install
$ npm i
```
Configure o banco de dados no .env
DB_HOST=SEU HOST
DB_PORT=3306
DB_DATABASE=SUA BASE
DB_USERNAME=SEU USER
DB_PASSWORD=SEU PASS

```sh
$ php artisan migrate
```

### Uso

```sh
$ php artisan serve
```
- cadastro de usuário: localhost:8000/register
- login: localhost:8000/login
- enjoy
