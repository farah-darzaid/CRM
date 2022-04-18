# Introduction

* This simple CRM task.

* Application Name: CRM.

* Developer Info:
  * Name: Farah Darzaid.
  * Mobile : +962-78-976-2334.
  * E-mail: Darzaid.farah@gmail.com.

*App development environment:
   * PHP 8.0.12
   * LAravel Framework 9.8.1

## Installation

Clone this repository: 

```bash
 git clone https://github.com/farah-darzaid/CRM.git
```

Go inside project folder

```bash
cd CRM
```

Install dependencies:

```bash
composer install
```

* Rename .env.example to .env and edit to match your configuration.

Generate encryption key:

```bash
php artisan key:generate
```

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

* If you run the seeds, then you can login as admin with these credentials:

    * User     
      * Email: admin@admin.com
      * Password: password
