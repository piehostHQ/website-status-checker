<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Website Status Checker - Laravel

This project is a simple web application built with **Laravel** to check if a website is up and running. It allows users to input a website URL (either full or partial), and the system will check if the website is accessible. If the website is up, the app will return a success message; otherwise, it will inform the user that the website is down.

## Features

- Accepts full or partial URLs (e.g., `google.com`, `https://google.com`, `www.example.com`).
- Checks the status of a website using a `GET` request.
- Returns a JSON response with the status (`up` or `down`) and a corresponding message.
- Error handling in case the website cannot be reached.
- Frontend UI built with Bootstrap for responsive design.

## Requirements

Before running the application, make sure you have the following installed on your machine:

- [PHP](https://www.php.net/) >= 8.0
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/docs/9.x)
- [SQLite Database](https://www.sqlite.org/) (optional for session storage, can use other database options as well)
- [Node.js](https://nodejs.org/) (for frontend dependencies)

## Installation

Follow the steps below to set up this application on your local machine:

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/your-username/website-status-checker.git
cd website-status-checker
```
Install the PHP dependencies using Composer:
```
composer install
```
Set Up Environment Variables
Copy the .env.example file to .env:

```
cp .env.example .env
Generate the application key:
```
```
php artisan key:generate
Configure the environment file .env if necessary (e.g., set the database connection).
```
If you're using a database for storing data (like sessions), you can run the following migration command:

```
php artisan migrate
```
Install Frontend Dependencies
Install Node.js dependencies for the frontend:
```
npm install
```
Serve the Application
Now, you can run the application locally with:
```
php artisan serve
```
The application will be available at http://127.0.0.1:8000.



