FROM klovercloud/php-8.0.2-apache2-laravel:v1.0.1
WORKDIR $TEMP_APP_HOME
COPY . .
RUN mkdir -p bootstrap/cache vendor
RUN chmod +x init.sh
RUN sed -i 's/\r$//' init.sh
# install all PHP dependencies
RUN composer install --no-interaction

EXPOSE 8080

EXPOSE 8081

WORKDIR $APP_HOME
USER klovercloud
