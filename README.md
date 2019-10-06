# Yuk Temuin
Adalah sebah aplikasi web untuk memposting pengumuman barang hilang atau penemuan barang

# Requirements

  - php 7.2 >= CLI and FPM
  - Node js v12.11.0 >=
  - npm 6.11.3 >=
  - Composer
  - Mysql 5.7.27 
  - Web server Apache or Nginx
  
# Installation
- Clone this git repo
- Go to the root folder
- Install php library by running 'composer install'
- install npm library by running 'npm install'
- compile assets by running 'npm run prod'
- Point your web server to '/public' directory inside the root folder
- Copy the .env.example file to .env file, change the content according to your need
- run 'php artisan migrate' to create all tables that are needed
- run 'php artisan db:seed --class=DevelopmentDataSeeder' for seeding development data

