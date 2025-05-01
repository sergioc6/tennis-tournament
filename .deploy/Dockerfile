FROM php:8.4-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    zip \
    unzip \
    git \
    supervisor \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring xml gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorios necesarios
RUN mkdir -p /var/www/html /var/log/supervisor

# Configurar NGINX
COPY .deploy/nginx/default.conf /etc/nginx/sites-available/default

# Configurar supervisord
COPY .deploy/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copiar código de la app desde el nivel superior
COPY . /var/www/html

WORKDIR /var/www/html

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80

CMD ["/usr/bin/supervisord"]
