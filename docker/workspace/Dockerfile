FROM php:7.3-cli-alpine3.9

LABEL maintainer="Rizart Dokollari <***REMOVED***>" \
    version="1.0"

# Install system requirements
RUN apk add --update composer \
    && rm -rf /tmp/* /var/cache/apk

ARG APP_UID
ARG APP_GID
RUN addgroup app-group -g ${APP_GID} \
    && adduser app-user -G app-group -D -u ${APP_UID}

WORKDIR /app
RUN chown -R ${APP_UID}:${APP_GID} /app
USER app-user
