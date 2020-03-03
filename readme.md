# Carnet Virtual  - Installation guide

## 1.	Tools/ Libraries

-	Laravel V 5.8
-	Vue.js V 2.5
-	Material Dashboard Pro BS3 by creative tim
-	MySQL
-   Node V 4.2.6

## 2.	Cloning repo and install dependencies

git clone https://github.com/andresmauro17/carnet_virtual.git 
composer update
npm install

## 3.	installing backend

- create a .env file as 

``` markdown
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carnet_virtual
DB_USERNAME=yourdatabaseuser
DB_PASSWORD=yourdatabasepassword

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=database

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null

FILESYSTEM_DRIVER=
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_URL=

PUSHER_KEY=
PUSHER_SECRET=
PUSHER_APP_ID=
```

-configure key  

php artisan key:generate

-clear cache becouse change .env file

php artisan config:cache && php artisan cache:clear && php artisan view:clear && composer dump-autoload

-migrate database and seed

php artisan migrate 
php artisan db:seed 

## 3.	installing voyager for admin
  
php artisan voyager:install
php artisan voyager:admin your@email.com --create
