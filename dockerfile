# Usando imagem base com Apache e PHP 8.2
FROM php:8.2.18-apache

# Instalar extensões PHP necessárias para o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar a aplicação PHP para o diretório padrão do Apache
COPY src/ /var/www/html/

# Expor a porta 80 para o servidor web
EXPOSE 80

# Iniciar o Apache
CMD ["apache2-foreground"]
