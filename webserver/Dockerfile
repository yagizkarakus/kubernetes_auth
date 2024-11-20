# Use an official PHP image with Apache
FROM php:7.4-apache

ENV servername "mysql"

ENV username "root"

ENV password "my-secret-pw"

ENV dbname "user_auth"

# Install mysqli extension for PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable mod_rewrite for Apache (optional if you need URL rewriting)
RUN a2enmod rewrite

# Set working directory
WORKDIR ./

# Copy local files to the container's /var/www/html
COPY ./ /var/www/html/

# Expose port 80 for Apache
EXPOSE 80
