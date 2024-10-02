# Use an official PHP image with Apache
FROM php:8.2-apache

ENV servername "124.243.148.112"

ENV username "root"

ENV password "my-secret-pw"

ENV dbname "user_auth"

# Install mysqli extension for PHP
RUN docker-php-ext-install mysqli

# Enable mod_rewrite for Apache (optional if you need URL rewriting)
RUN a2enmod rewrite

# Set working directory
WORKDIR /root/workspace

# Copy local files to the container's /var/www/html
COPY ./ /var/www/html/

# Expose port 80 for Apache
EXPOSE 80

