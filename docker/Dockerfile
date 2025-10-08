# Imagem base com PHP 8.4 e Apache
FROM php:8.4-apache

# Diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos da aplicação
COPY app/ /var/www/html/

# Copia as configurações customizadas do Apache
COPY docker/apache/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copia o php.ini global
COPY docker/php/php.ini /usr/local/etc/php/

# Instala Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Expondo porta padrão
EXPOSE 80

# Comando padrão do container
CMD ["apache2-foreground"]