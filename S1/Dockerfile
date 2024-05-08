# Use a imagem do PHP 8 com o Apache
FROM php:8.0-apache

# Instale as dependências para conectar ao PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copie o código PHP para o diretório de trabalho do contêiner
COPY index.php /var/www/html/

# Expor a porta 80 para acesso web
EXPOSE 80
