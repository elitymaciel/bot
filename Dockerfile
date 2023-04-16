FROM php:8.0-apache as builder

# Instalar o Nano
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable pdo_mysql


# Instalar o pacote zip
RUN apt-get update && \
    apt-get install -y zip unzip && \
    rm -rf /var/lib/apt/lists/*

# Copiar os arquivos do seu aplicativo para o contêiner
COPY . /var/www/html/
 
# Configurar o servidor Apache com SSL

# Configurar o servidor Apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Instalar dependências com Composer
#COPY composer.json composer.lock /var/www/html/
##RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
##   && composer install --no-dev --no-scripts --no-autoloader
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Expor as portas 80 e 443 do contêiner
EXPOSE 81 

# Definir o diretório de trabalho
WORKDIR /var/www/html/
