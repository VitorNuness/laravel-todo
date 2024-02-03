# To Do List API in Laravel 10
A API to To Do List in Laravel 10.
## Requirements
- Git
- Laravel 10
- Composer
## Use
```bash
mkdir <foulder_name>
cd <foulder_name>
git init
git remote add origin https://github.com/VitorNuness/laravel-todo.git
git branch -m main
git pull origin main
cd todo
cp .env.example .env
```
- Update the enviroment variables on .env file:
```bash
APP_NAME=Todo-Laravel
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<data_base_name>
DB_USERNAME=<user_name> or root
DB_PASSWORD=<password> or null
```
- Run migrations and initialize the server
```bash
php artisan migrate
php artisan serve
```