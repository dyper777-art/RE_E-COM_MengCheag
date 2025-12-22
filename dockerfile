# Base PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    git \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install intl pdo mbstring xml curl opcache \
    && rm -rf /var/lib/apt/lists/*

# Copy composer files and install dependencies
COPY composer.json composer.lock /app/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copy the rest of the application
COPY . /app

# Install Node dependencies
RUN npm install
RUN npm prune --omit=dev --ignore-scripts

# Expose port (optional, if using built-in PHP server for dev)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
