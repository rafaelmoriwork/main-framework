# Imagem base com PHP 8.4 e Apache
FROM php:8.4-apache

# Diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos da aplicação
COPY src/ /var/www/html/

# Copia as configurações customizadas do Apache
COPY docker/apache/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copia o php.ini global
COPY docker/php/php.ini /usr/local/etc/php/

# Habilita extensões comuns do PHP
RUN apt-get update && apt-get install -y unzip curl

# Instala Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Instala o composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Adicionar o Composer global no PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

# Instalar PHP CS Fixer (última versão)
RUN composer global require friendsofphp/php-cs-fixer --no-interaction --no-plugins --prefer-dist

# Instala as dependencias
RUN composer install

# Faz o autoload das classes
RUN composer dump-autoload

# Expondo porta padrão
EXPOSE 80

# Comando padrão do container
CMD ["apache2-foreground"]