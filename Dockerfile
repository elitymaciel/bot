FROM php:8.0-apache as builder

# Instalar o Nano
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable pdo_mysql
 

# Copiar os arquivos do seu aplicativo para o contêiner
COPY . /var/www/html/

# Configurar o servidor Apache com SSL

# Configurar o servidor Apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Expor as portas 80 e 443 do contêiner
EXPOSE 81 

# Definir o diretório de trabalho
WORKDIR /var/www/html/ 