# nginxの公式イメージ（偶数が安定バージョンらしい）
FROM nginx:1.18-alpine

COPY ./infra/nginx/prod/default.conf /etc/nginx/conf.d/default.conf
COPY ./laravel/public /var/www/laravel/public