# Usa una imagen oficial de PHP 8.2 con FPM
FROM php:8.2-fpm

# Instala dependencias del sistema y extensiones de PHP
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nginx \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo_pgsql pgsql zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de tu proyecto
COPY . .


# ----------------- INICIO DEL BLOQUE A AÑADIR ----------------- #
# Cambia el propietario de los archivos al usuario del servidor web.
RUN chown -R www-data:www-data /var/www/html

# Da permisos de escritura a las carpetas de storage y bootstrap/cache.
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
# ------------------ FIN DEL BLOQUE A AÑADIR ------------------ #

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Copia la configuración de Nginx
COPY .docker/nginx.conf /etc/nginx/sites-available/default

# Expone el puerto 80 para el servidor web
EXPOSE 80

# Copia el script de inicio y dale permisos de ejecución
COPY .docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Define el punto de entrada del contenedor
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
