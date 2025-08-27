#!/usr/bin/env bash
# Salir si un comando falla
set -o errexit

# Instalar dependencias de PHP
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Generar la clave de la aplicación
php artisan key:generate --force

# Ejecutar las migraciones de la base de datos
php artisan migrate --force

# Limpiar cachés para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache