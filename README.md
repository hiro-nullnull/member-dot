# member-dot

登録した人が一覧で表示されるだけのメンバー紹介的なやつ。

## ローカル環境構築手順
手元にDocker環境がある前提で進めます。Dockerアプリ（Docker for Macとか）いれればOK。

1.Dockerコンテナを起動する
```
docker-compose up -d
```

2.起動したLaravelのコンテナにログインし、必要なパッケージをインストールする
```
docker-compose exec member-dot-app ash
composer install

composer installが完了したら下記実行
cd frontend
yarn install
```

3.必要なテーブルを作成し、初期データを挿入する
```
cd /work
php artisan migrate
php artisan db:seed
```

4.VueのdevServerを起動する
```
・Laravelコンテナ内にいる場合
cd /work/frontend
yarn serve

・ホスト側にいる場合
cd laravel/frontend/
yarn docker-serve
```

## docker-composeコマンドメモ

dockerコンテナにログイン
```
docker-compose exec ${コンテナ名} ${シェル}
member-dot-app : ash
nginx : ash
mysql : bash
```

ローカルMySQLにログイン
```
docker-compose exec mysql mysql -u root -p member_dot
```

【超危険】dockerのイメージやボリュームを全て破棄（全てを無に帰するコマンド）
```
docker-compose down --rmi all --volumes --remove-orphans
```

## Laravelコマンドメモ
migrationファイル作成
```
php artisan make:migration create_table_${テーブル名} --create=${テーブル名}
```

migrationの実行状況確認
```
php artisan migrate:status
```

migration実行
```
php artisan migrate
```

全てのmigrateを戻す
```
php artisan migrate:reset
```

指定のステップまでmigrate実行状態を戻す
```
php artisan migrate:rollback --step=${ステップ番号}
```

seeder実行
```
php artisan db:seed
```

テーブルを再作成してseeder実行
```
php artisan migrate:refresh --seed
```

## GKE関連メモ
参考資料
```
https://cloud.google.com/kubernetes-engine/docs/tutorials/hello-app?hl=ja
https://cloud.google.com/sql/docs/mysql/create-instance?hl=ja#console
https://cloud.google.com/sql/docs/mysql/connect-kubernetes-engine?hl=ja
https://cloud.google.com/sql/docs/mysql/connect-admin-proxy?hl=ja#macos-64-bit
```

### デプロイ手順
GKEのデプロイは下記ステップでやりました。
```
1.Dockerコンテナをビルド
2.GCR (Google Container Registry)にアップロード
3.GKEの対象クラスタでデプロイ
4.対象Deployment (デプロイしたコンテナ群) をServicesで外部公開
```

### コマンド
dockerコンテナのビルド
```
Dockerfileがある場所に移動して実行
docker build -t gcr.io/${プロジェクトID}/${コンテナ名}:v1 .

Dockerfileを指定したい場合は-fオプションをつける
docker build -t gcr.io/${プロジェクトID}/${コンテナ名}:v1 -f infra/app/prod/Dockerfile .
```

GCRへのアップロード
```
docker push gcr.io/${プロジェクトID}/${コンテナ名}:v1
```

デプロイコマンド
```
applyの方がいい（前回との差分とかとれるらしい）
createの方だとオプションをつけないと、createのあとのapplyでエラーになる
kubectl create --save-config -f ${対象のマニフェストファイル}.yml 
kubectl apply -f ${対象のマニフェストファイル}.yml
```

Pod一覧
```
kubectl get pods
```

ログ確認
```
複数のコンテナで構成されるPodは下記で特定のコンテナのログが見れる
kubectl logs ${Pod名} -c ${コンテナ名}
```

Pod内のコンテナにログイン
```
kubectl exec -it -n ${namespace} ${対象Pod} /bin/${シェル}
```
