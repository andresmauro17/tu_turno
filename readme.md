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
php artisan voyager:admin admin@mail.com --create


## procedur take a turn

1. imprimir turno
    - INSERT INTO turns (is_active, created_at, service_id, consecutive_string  ) 
        VALUES (1, '2020-mm-dd hh:mm:ss', service_id, service_shortname + service_consecutivenumber);

    - INSERT INTO diligences_modules_turns (diligence_id, turn_id, created_at  ) 
        VALUES (proxima_diligencia_del_servicio, turn_id, '2020-mm-dd hh:mm:ss);

2. siguiente (LLAMAR)
    -   UPDATE diligences_modules_turns AS dmt
        SET module_id = module_id, time_atention = '2020-mm-dd hh:mm:ss', updated_at = '2020-mm-dd hh:mm:ss'
        WHERE dmt.module_id = null, dmt.diligence_id = la misma diligencia del modulo 
        ORDER BY ID LIMIT 1 ;// el primero de la lista

2. atender turno
    -   UPDATE diligences_modules_turns
        SET time_atention = '2020-mm-dd hh:mm:ss', updated_at = '2020-mm-dd hh:mm:ss'
        WHERE dmt.module_id = sea el mismo modulo , time_atention = null, sea activo
        ;

2. finalizar tramite
    -   UPDATE diligences_modules_turns
        SET END_atention = '2020-mm-dd hh:mm:ss', updated_at = '2020-mm-dd hh:mm:ss'
        WHERE dmt.module_id = sea el mismo modulo , time_atention = algo
        ;

2. finalizar 
    -   UPDATE diligences_modules_turns
        SET END_atention = '2020-mm-dd hh:mm:ss', updated_at = '2020-mm-dd hh:mm:ss'
        WHERE dmt.module_id = sea el mismo modulo , time_atention = algo
        ;
    -   UPDATE turns
        SET end_atention = '2020-mm-dd hh:mm:ss', updated_at = '2020-mm-dd hh:mm:ss'
        WHERE dmt.module_id = sea el mismo modulo , time_atention = algo
        ;

turnos

cuando se quiere resetear el contador de los turnos, se setea a 0 el consecutive_number en la tabla servicios y se actualiza los turnos de ese servicio  donde el copnsecutivo_string sea igual al del servicio, actualizar el campo is_active a 0

los turnos is_active=0 son los que ya no tendra en cuenta el sistema

