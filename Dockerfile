FROM php:8.1-apache

# Instal ekstensi mysqli
RUN docker-php-ext-install mysqli

# Copy aplikasi Anda ke dalam container
COPY ./src /var/www/html/

# Berikan izin yang tepat pada direktori dan file
RUN chown -R www-data:www-data /var/www/html/ && chmod -R 755 /var/www/html/

# Aktifkan modul Apache rewrite
RUN a2enmod rewrite

EXPOSE 80
