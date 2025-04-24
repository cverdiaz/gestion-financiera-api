# Usa la imagen base oficial de PHP con Apache y extensiones útiles
FROM php:8.2-apache

# Comentario: Instalamos herramientas esenciales del sistema y extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

# Comentario: Habilitamos mod_rewrite de Apache, necesario para rutas amigables
RUN a2enmod rewrite

# Comentario: Establecemos el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Comentario: Copiamos los archivos del proyecto Laravel al contenedor
COPY . .

# Comentario: Damos permisos necesarios a la carpeta de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Comentario: Instalamos Composer (gestor de dependencias de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Comentario: Ejecutamos `composer install` para instalar las dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Comentario: Sobrescribimos la configuración de Apache para apuntar al directorio public de Laravel
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Comentario: Exponemos el puerto 80 para acceder a Apache
EXPOSE 80
