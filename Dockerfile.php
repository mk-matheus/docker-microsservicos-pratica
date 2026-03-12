FROM php:8.0-apache

# Instala a extensão mysqli necessária para o código PHP funcionar
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copia o código da aplicação para a pasta pública do Apache
COPY index.php /var/www/html/

# Expõe a porta 80 do Apache
EXPOSE 80