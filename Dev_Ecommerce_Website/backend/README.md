# Laravel
Backend Environment


## Run Locally:

Clone the project:

Go to the project frontend directory:

```bash
  cd Laravel-Vue-SPA-Ecommerce/frontend
```

Install frontend dependencies:

```bash
  npm install
```
Run frontend:

```bash
  npm run dev
```

Go to the project backend directory:

First open new terminal.

```bash
  cd Laravel-Vue-SPA-Ecommerce/backend
```

Install dependencies:

```bash
  composer install
  npm install
```
Create .env file and copy .env.example to .env, create database name and add into .env database name.

Key Generate
```bash
  php artisan key:generate
```
Storage Link
```bash
  php artisan storage:link
```

Migrate database:

```bash
  php artisan migrate --seed
```

Run project:

```bash
  php artisan serve
```

Open another terminal for vite:

```bash
  cd Dev_Ecommerce_Website/backend
```

```bash
  npm run dev
```

Open: http://127.0.0.1:8000

**If you work with order, add stripe key and mail config in .env**


## Get In Touch

- **email : baselkaffoura@gmail.com**

- **Phone : +971503898795**