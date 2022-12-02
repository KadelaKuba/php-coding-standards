FROM php:8.1-fpm as base

COPY --from=composer /usr/bin/composer /usr/bin/composer

# install required tools
# git for computing diffs
# unzip to ommit composer zip packages corruption
RUN apt-get update && \
    apt-get install -y \
    unzip git \
    && apt-get clean

WORKDIR /var/www
