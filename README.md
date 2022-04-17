# Introduction

* This project built as training of designing and auth system in Laravel.

* Application Name: Office Home.

* Developer Info:
  * Name: Farah Darzaid.
  * Mobile : +962-78-976-2334.
  * E-mail: Darzaid.farah@gmail.com.

*App development environment:
   * PHP 7.2
   * LAravel Framework 7.0

## Installation

Clone this repository: 

```bash
 git clone https://github.com/farah-darzaid/Office_Home.git
```

Go inside project folder

```bash
cd Office_Home
```

Install dependencies:

```bash
composer install
```

Generate encryption key:

```bash
php artisan key:generate
```

* Rename .env.example to .env and edit to match your configuration.

* Create new schema and name it whatever you want, but remember to reflect this on .env file

* Run migrations to create tables and indexes:

``` bash
php artisan migrate:fresh
```

* Run seeds to populate data:
``` bash
php artisan db:seed
```

## Using the app
* Start a PHP server, by running this command:

``` bash
php artisan serve
Laravel development server started: http://127.0.0.1:8000
```

* If you run the seeds, then you can login by either of these two users:

    * User     
      * Email: user@localhost.com
      * Password: user
