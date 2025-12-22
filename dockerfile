# Use PHP 8.2 FPM base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install system packages required by PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    git \
    curl \
    && docker-php-ext-install intl zip pdo mbstring xml curl opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY composer.json composer.lock /app/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies from lock file
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copy the rest of the application
COPY . /app

# Install Node.js dependencies
RUN apt-get install -y nodejs npm
RUN npm install
RUN npm prune --omit=dev --ignore-scripts

# Expose port for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
