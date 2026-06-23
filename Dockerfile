FROM tangramor/nginx-php8-fpm:php8.4.1_node23.3.0
RUN cp /usr/local/bin/php /usr/local/bin/php.tmp && mv -f /usr/local/bin/php.tmp /usr/local/bin/php && chmod +x /usr/local/bin/php

COPY . .
COPY conf/nginx/nginx-site.conf /etc/nginx/conf.d/default.conf
COPY conf/php-fpm.conf /etc/php-fpm.d/www.conf

RUN chmod +x scripts/*.sh
RUN chmod -R 777 storage bootstrap/cache

RUN composer install --no-dev --no-interaction --prefer-dist

ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]