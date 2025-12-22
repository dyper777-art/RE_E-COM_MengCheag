FROM php:8.2-fpm

WORKDIR /app

# Install system dependencies + PHP extensions + Node.js
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    git \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install intl zip pdo mbstring xml curl opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY composer.json composer.lock /app/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copy the rest of the application
COPY . /app

# Install Node dependencies
RUN npm install
RUN npm prune --omit=dev --ignore-scripts

EXPOSE 9000

CMD ["php-fpm"]
