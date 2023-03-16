FROM php:8.0.2-fpm

# Copy composer.lock and composer.json
COPY composer.json /var/www/

# composer.lock 

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    npm 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql
# RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
# RUN docker-php-ext-install gd

# RUN docker-php-ext-install -j$(nproc) gd

# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     --with-gd \
#     --with-jpeg-dir \
#     --with-png-dir \
#     --with-zlib-dir

# RUN docker-php-ext-install -j$(nproc) gd    

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions gd

RUN apt-get update


# # Start the supervisor instance when the machine autostarts
# RUN echo "supervisord -c /etc/supervisor/supervisord.conf" >> /root/.bashrc

# Copy config file for Supervisor (Custom supervisord.conf)
# COPY ./supervisor/* /etc/supervisor/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# RUN chown -R www:www /var/log/supervisor
RUN chown -R www:www /var/run

# Copy existing application directory contents
COPY . /var/www

# RUN echo_supervisord_conf > /etc/supervisor/supervisord.conf

# COPY --chown=root:root ./supervisor /etc/supervisor/
# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD docker-php-entrypoint php-fpm

