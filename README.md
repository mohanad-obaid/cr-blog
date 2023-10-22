# Laravel Blog App

Welcome to the Laravel Blog App! This is a simple guide to help you clone and run this Laravel application on your local development environment.

## Prerequisites

Before you begin, make sure you have the following prerequisites installed on your system:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (Laravel compatible version)
- [Git](https://git-scm.com/)
- [MySQL](https://www.mysql.com/) or other supported database systems
- [npx](https://www.npmjs.com/package/npx) (Node.js package runner)
- A web server (e.g., Apache, Nginx)
- Command-line interface (Terminal, Command Prompt)

## Method #1 : Run the Application dockerized using sail

Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development environment. Sail provides a great starting point for building a Laravel application using PHP, MySQL, and Redis without requiring prior Docker experience.

At its heart, Sail is the docker-compose.yml file and the sail script that is stored at the root of your project. The sail script provides a CLI with convenient methods for interacting with the Docker containers defined by the docker-compose.yml file.

Laravel Sail is supported on macOS, Linux, and Windows

```bash
git clone https://github.com/mohanad-obaid/cr-blog.git
```

### Environment Setup
Navigate to the root directory of the cloned Laravel app:
```bash
cd cr-blog
```
### Install Dependencies
Install the project's PHP dependencies using Composer:
```bash
composer install
```
Install the project's Node dependencies using npm:
```bash
npm install
```
do node build:
```bash
npm run build
```
### Configuration
Make a copy of the `.env.example` file and save it as `.env`:
```bash
cp .env.example .env
```
Edit the .env file and configure your application settings, including database connection details, app key, and any other environment-specific settings.

Generate a new application key:

```bash
php artisan key:generate
```

### Database Setup
Create a new database for your Laravel application in your database management system.

Update the .env file with your database configuration details:

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cr_blog
DB_USERNAME=sail
DB_PASSWORD=password
```

### run the application using sail
Navigate to the root directory of the cloned Laravel app:
```bash
./vendor/bin/sail up
```

Run the database migrations on another command line tab to create the required tables:

```bash
./vendor/bin/sail artisan migrate
```

Run the command to create the symlink :

```bash
./vendor/bin/sail artisan storage:link
```

Enjoy :)

## Method #2 : the Application without docker

### Clone the Repository

First, clone the Laravel app repository using the following command:

```bash
git clone https://github.com/mohanad-obaid/cr-blog.git
```

### Environment Setup
Navigate to the root directory of the cloned Laravel app:
```bash
cd cr-blog
```

### Install Dependencies
Install the project's PHP dependencies using Composer:
```bash
composer install
```
Install the project's Node dependencies using npm:
```bash
npm install
```
do node build:
```bash
npm run build
```
### Configuration
Make a copy of the `.env.example` file and save it as `.env`:
```bash
cp .env.example .env
```

Edit the .env file and configure your application settings, including database connection details, app key, and any other environment-specific settings.

Generate a new application key:

```bash
php artisan key:generate
```

### Database Setup
Create a new database for your Laravel application in your database management system.

Update the .env file with your database configuration details:

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cr_blog
DB_USERNAME=cr_user
DB_PASSWORD=
```

Run the database migrations to create the required tables:

```bash
php artisan migrate
```

### Run the Application
To run the Laravel application, use the built-in development server:

```bash
php artisan serve
```
This will start the application on `http://localhost:8000`.

### Access the Application
Open your web browser and navigate to http://localhost:8000 to access Laravel blog application.

Enjoy :)