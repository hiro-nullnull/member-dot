# fpmだとコンテナが起動せず終了してた fpmって文字列に意味がある？
# 対象のOSのバージョンによってサポートしているNode.jsのバージョンが異なっていた。
# alpineの場合は3.12系だとNode.jsの12系をサポートしていた
# どうしても最新のバージョンのOSでないといけない場合は、Node.jsのパッケージに対してalpineのリポジトリ指定で特定のバージョンを入れることは可能らしい（alpineの特定のバージョンが
# サポートしているNode.jsを入れるみたいな）
FROM php:7.3.27-fpm-alpine3.12

RUN apk update && apk add --no-cache yarn nodejs \
  freetype-dev libjpeg-turbo-dev libpng-dev libmcrypt-dev \
  git vim unzip tzdata \
  libmcrypt-dev \
  libltdl \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv \
  && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
  && apk del tzdata \
  && rm -rf /var/cache/apk/*

ADD ./infra/app/prod/php.ini /usr/local/etc/php/php.ini

# Docker公式のcomposerイメージからコピー
# https://hub.docker.com/_/composer
COPY --from=composer:2.0.9 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/laravel/
ADD ./laravel/ /var/www/laravel/
RUN chmod 777 -R /var/www/laravel/storage
RUN composer install
