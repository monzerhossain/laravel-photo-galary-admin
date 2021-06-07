#!/bin/bash

php artisan migrate
php artisan breeze:install
npm install
npm run dev
php artisan serve --host=0.0.0.0 --port=8000
