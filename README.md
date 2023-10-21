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

## Getting Started

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
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
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
