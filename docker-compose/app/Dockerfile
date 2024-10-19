FROM php:8.3-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    ffmpeg \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd && docker-php-ext-enable opcache

RUN apt-get update -y
RUN apt-get install libyaml-dev -y

RUN pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 10G/' /usr/local/etc/php/php.ini
RUN sed -i 's/post_max_size = 8M/post_max_size = 10G/' /usr/local/etc/php/php.ini
RUN sed -i 's/max_execution_time = 30/max_execution_time = 600/' /usr/local/etc/php/php.ini
RUN sed -i 's/max_input_time = 60/max_input_time = 600/' /usr/local/etc/php/php.ini
RUN sed -i 's/memory_limit = 128M/memory_limit = 4G/' /usr/local/etc/php/php.ini

# Set working directory
WORKDIR /var/www

USER $user
