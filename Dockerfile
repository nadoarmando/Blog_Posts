# # Use an official PHP image with Apache
# FROM php:8.3-apache

# # Set the working directory in the container
# WORKDIR /var/www/html

# # Copy your application code into the container
# COPY . /var/www/html

# # Enable Apache modules if needed
# RUN a2enmod rewrite

# # Expose port 80 for the Apache web server
# EXPOSE 80

# # Start Apache in the foreground
# CMD ["apache2-foreground"]
# # Install mysqli extension
# RUN docker-php-ext-install mysqli
# Use an official PHP image with Apache
FROM php:8.3-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your application code into the container
COPY . /var/www/html

# Enable Apache modules if needed
# RUN a2enmod rewrite

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Expose port 80 for the Apache web server
EXPOSE 80

# Start Apache in the foreground
# CMD ["apache2-foreground"]docker-compose exec db mysql -uuser -ppassword blog_post_db

