FROM php:7.3-cli-alpine3.9

LABEL maintainer="Rizart Dokollari <***REMOVED***>" \
    version="1.0"

# Install system requirements
RUN apk add composer \
    && apk add libzip-dev \
    && docker-php-ext-install zip \
 && rm -rf /tmp/* /var/cache/apk

ARG APP_UID
ARG APP_GID
RUN addgroup app-group -g ${APP_GID} \
    && adduser app-user -G app-group -D -u ${APP_UID}

WORKDIR /app
RUN chown -R ${APP_UID}:${APP_GID} /app
USER app-user

COPY --chown=app-user:app-group composer.json composer.lock ./
RUN composer install

COPY --chown=app-user:app-group  . .
RUN ./vendor/bin/codecept build

