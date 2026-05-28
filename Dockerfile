FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install

RUN npm run build

RUN ls -la public/build && ls -la public/build/assets && cat public/build/manifest.json

EXPOSE 8080

CMD php artisan config:clear && php artisan migrate --force && php -S 0.0.0.0:${PORT:-8080} -t public server.php
