# docker-vue

dockerコンテナにログイン

`docker-compose exec ${コンテナ名} sh`

ローカル環境のフロント起動

`docker-compose exec app sh startup.sh`

MySQLにログイン

`docker-compose exec mysql mysql -u root -p welcome`

【超危険】dockerのイメージやボリュームを全て破棄

`docker-compose down --rmi all --volumes --remove-orphans`

docker-compose downで下記エラーが出た時の対処

ERROR: error while removing network: network docker-vue_default 

`docker-compose down --remove-orphans`

`php artisan make:migration create_table_${テーブル名} --create=${テーブル名}`

`php artisan migrate:status`

全てのmigrateを戻す

`php artisan migrate:reset`

指定のステップまでmigrate実行状態を戻す

`php artisan migrate:rollback --step=${ステップ番号}`
