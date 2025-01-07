# Use the official PHP image with Apache
FROM php:8.1-apache

# Install MySQL client (if you want to interact with MySQL from PHP)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (required for some URL rewriting and routing in PHP)
RUN a2enmod rewrite

# Set up the working directory in the container
WORKDIR /var/www/html

# Copy the PHP code to the container's working directory
COPY . /var/www/html/

# Expose port 80 for the web server
EXPOSE 80

# Set up the Apache server to run when the container starts
CMD ["apache2-foreground"]
