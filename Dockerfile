FROM php:8.4-cli

# Instalar paquetes
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Instalar dependencias PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Instalar dependencias Node
RUN npm install

# Compilar Vite + Tailwind
RUN npm run build

EXPOSE 8080

CMD php artisan optimize:clear && php artisan migrate --force && php -S 0.0.0.0:${PORT:-8080} -t public
