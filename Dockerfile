FROM php:8.1-apache

# Install PDO MySQL and other required extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite
