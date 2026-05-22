# Filament SaaS

## A stable version is coming.
All changes in the database during the beta versions need to be updated manually. In the first stable versions, I will not introduce several breaking changes without migrations.

# Overview
This repository provides a robust template for building scalable, multi-tenant SaaS applications. It addresses the common challenges faced in multi-tenant development.

## Key features:

Flexibility: Adapts to different use cases and requirements.
Scalability: Designed to handle growing user bases.
Security: Protects user data.
Get started today and build your multi-tenant SaaS application with confidence.

[![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](/LICENSE)

## Introduction

The purpose of this project is provide a simple way to create web aplications. We use [Laravel](https://laravel.com/) framework with [Filament Admin](https://filamentphp.com/).


## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)

Clone the repository or create from template:

    git clone https://github.com/A2Insights/filament-saas-template.git

Switch to the repo folder:

    cd filament-saas-template

Install all php dependencies using composer:

    composer install

Copy the example env file and config the database credentials.

    cp .env.example .env

> See all env vars available in the .env.example file.

Config in the .env the database vars

Generate a new application key:

    php artisan key:generate

Flush de application cache:

    php artisan optimize

Run the database migrations.

    php artisan filament-saas:install --no-interaction

PS: Make sure you set the correct database connection information before running the install command.

Start the local development server:

    php artisan serve

Install all node dependencies using npm:

    npm install

Compile the css and javascript assets:

    npm run dev

You can now access the server at <http://127.0.0.1:8000>

### Finish 

Go to <http://localhost/sysadmin/login> and login with the following credentials:

#### Super Admin
- **Email:** `super_admin@filament-saas.dev`
- **Senha:** `123456`

#### Admin 
- **Email:** `admin@filament-saas.dev`
- **Senha:** `123456`

#### User 
- **Email:** `user@filament-saas.dev`
- **Senha:** `123456`

### Using Laravel Sail to develop

make .env config:

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

And run:

    vendor/bin/sail build

    vendor/bin/sail up -d

    vendor/bin/sail sail artisan optimize

    vendor/bin/sail artisan filament-saas:install --no-interaction

    npm run install 

    npm run dev

You can now access the server at <http://localhost>

**For more information: <https://laravel.com/docs/sail>**

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email atila.danvi@outlook.com instead of using the issue tracker.

## Credits

-   [Atila Silva](https://github.com/a21ns1g4ts)
-   [All Contributors](../../contributors)

## License

The MIT License. Please see [license file](LICENSE.md) for more information.
