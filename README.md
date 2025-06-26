# Project
Task Mangement System
## Project Detail
Task Management System built for make the user role admin or user had permission to manage task is easy to manage all resource tasks.
### Feature
 - Manage Reasource Task: user can create, list, edit, remove (for admin or user had permission), by default if user normal employee can create, list, and edit their own task.
 - Manage Status of Task: user can create, list, edit, remove the status for each task (e.g. pending, progress, complete) via their permission
 - Manage Resource: user admin can create, list, edit, remove resource via their permission
### Technology Usage
 - PHP version >=8.2
 - Laravel version 12
 - MySQL
 - Spatie/laravel-permission version 6.18

## Installation
- Generate .env file
```bash
# create .env file then copy form .env.example
echo. > .env
cp .env .env.example
```
or
```bash
# change file .env.example to .env
cp .env .env.example
```
- Install dependency
```bash
# install all dependency in project
composer install
```
- Generate Key
```bash
# generate key in .env
php artisan key:generate
```
- Generate Admin User
```bash
# generate key in .env
php artisan generateadmin:credential {username} {email} {password}
```

