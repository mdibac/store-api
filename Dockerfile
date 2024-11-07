# Utilisez l'image PHP avec Apache
FROM php:8.1-apache

# Copie et activation du fichier de configuration Apache personnalisé
COPY ./config/000-default.conf /etc/apache2/sites-available/000-default.conf

# Activation des modules Apache nécessaires
RUN a2enmod rewrite

# Installation de PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql
