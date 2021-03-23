FROM mysql:8.0

ENV MYSQL_DATABASE=welcome \
  MYSQL_USER=welcomeuser \
  MYSQL_PASSWORD=jdas78@h!jd \
  MYSQL_ROOT_PASSWORD=jdas78@h!jd \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf
