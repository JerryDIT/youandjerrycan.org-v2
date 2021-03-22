FROM php:7.4.15-fpm-alpine

MAINTAINER Antoine DARCHE<darche.antoine@gmail.com>

RUN apk add --no-cache \
    git \
    unzip \
	autoconf \
	make \
	g++ \
	rabbitmq-c-dev \
	graphviz \
	ttf-freefont \
	yarn \
	npm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
#RUN rm /etc/localtime
#RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
#RUN "date"

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql

ARG APCU_VERSION=5.1.18
RUN pecl install \
		apcu-${APCU_VERSION} \
		amqp \
	; \
	pecl clear-cache; \
	docker-php-ext-enable \
		apcu \
		amqp \
	;

RUN echo 'alias sf="php app/console"' >> ~/.bashrc

WORKDIR /var/www/symfony
