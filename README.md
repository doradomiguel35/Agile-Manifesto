# Agile-Manifesto

### Installation requirements
1. Composer
2. NPM
3. PHP

### Technologies used
1. Lumen (Backend)
2. SQLite (DB)
3. Vue (Frontend)

## Backend Setup

```
cd am-backend

composer install
copy .env.example .env
php artisan key:generate
type nul > database/database.sqlite
php artisan migrate  
php artisan passport:install
php artisan db:seed --class=UserSeeder
php artisan db:seed
```

## Frontend Setup
```
cd am-frontend

npm install
```

## Run Vue Jest Test
```
npm run test:unit
```
