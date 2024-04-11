FROM php:8.3-apache
RUN apt-get update 
RUN apt-get install nano -y
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql

