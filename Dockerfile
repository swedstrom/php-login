FROM php:7.2.7-apache
EXPOSE 80
RUN docker-php-ext-install pdo pdo_mysql mysqli
copy apache2.conf /etc/apache2/apache2.conf
