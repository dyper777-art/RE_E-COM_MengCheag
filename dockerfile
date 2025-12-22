# Base PHP image
FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install system dependencies
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

# Install PHP dependencies from lock file
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copy the rest of your application
COPY . /app

# Install Node dependencies
RUN npm install
RUN npm prune --omit=dev --ignore-scripts

# Expose port (optional, depending on your setup)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
