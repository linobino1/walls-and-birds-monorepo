FROM php:8.0-apache

# install mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# update
RUN apt-get update && apt-get upgrade -y