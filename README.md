# docker-vue

dockerコンテナにログイン

`docker-compose exec ${コンテナ名} sh`

dockerのイメージやボリュームを全て破棄

`docker-compose down --rmi all --volumes --remove-orphans`

docker-compose downで下記エラーが出た時の対処

ERROR: error while removing network: network docker-vue_default 

`docker-compose down --remove-orphans`
