FROM mysql:8.0

# Set debian default locale to ja_JP.UTF-8
RUN apt-get update && \
    apt-get install -y locales && \
    rm -rf /var/lib/apt/lists/* && \
    echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
    #sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && \
    locale-gen && \
    update-locale LANG=ja_JP.UTF-8
    # locale-gen ja_JP.UTF-8
#ENV LC_ALL=ja_JP.UTF-8 \
#    LANG=ja_JP.UTF-8

ENV LANG="ja_JP.UTF-8"

# Set MySQL character
#RUN { \
#    echo '[mysqld]'; \
#    echo 'character-set-server=utf8mb4'; \
#    echo 'collation-server=utf8mb4_general_ci'; \
#    echo '[client]'; \
#    echo 'default-character-set=utf8mb4'; \
#} > /etc/mysql/conf.d/charset.cnf

ENV MYSQL_DATABASE=welcome \
  MYSQL_USER=welcomeuser \
  MYSQL_PASSWORD=jdas78@h!jd \
  MYSQL_ROOT_PASSWORD=jdas78@h!jd \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf