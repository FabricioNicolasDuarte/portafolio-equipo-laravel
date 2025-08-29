#!/bin/sh

# Ejecuta las migraciones de la base de datos
php artisan migrate --force

# Inicia los servicios
php-fpm &
nginx -g "daemon off;"
