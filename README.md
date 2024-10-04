# restaurant-rsv1


##README 2024/09/28 修正

## アプリケーション名

飲食店予約管理システム
![alt text](<スクリーンショット 2024-09-30 9.39.45.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.02.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.39.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.22.png>)
![alt text](<スクリーンショット 2024-09-30 9.21.29.png>)
![alt text](<スクリーンショット 2024-09-30 9.21.51.png>)
![alt text](<スクリーンショット 2024-09-30 9.24.07.png>)


## 作成した目的

飲食店の情報HPを構築し、お店情報を掲載。ユーザが予約、お気に入り登録できるようにする

## アプリケーション URL

- 店舗一覧ページ http://localhost/

## レポジトリー
https://github.com/takatsutsu/restaurant-rsv1.git

## 他のレポジトリー

## 機能一覧

- 会員情報登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

##  追加実装項目　　※詳細は後述
- 予約変更機能
- バリデーション
- レスポンシブデザイン
- 管理画面
- ストレージ
- 認証
- メール送信
- リマインダー
- QRコード
- 環境の切り分け

##  　追加機能（未実施項目）
- 評価機能
- 決済機能
- AWS


## 使用技術(実行環境)

- PHP 7.4.9
- Laravel Framework 8.83.8
- MySQL 8.0.26
- phpmyadmin 5.2.1

## テーブル設計
![alt text](<スクリーンショット 2024-09-30 10.24.41-1.png>)
![alt text](<スクリーンショット 2024-09-30 10.25.23.png>)
![alt text](<スクリーンショット 2024-09-30 10.25.35.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.04.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.14.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.27-1.png>)

## ER 図
![alt text](coachtech上級案件.drawio-1.png)



## 環境構築

**GITHUBからのプロジェクトフォルダ取得**

- `$ cd coachtech/laravel`  
- `$ git clone https://github.com/takatsutsu/restaurant-rsv1.git [restaurant-rsv1]`  
※[restaurant-rsv1]は任意のフォルダ


**開発の履歴を残すために、個人個人のリモートリポジトリの url を変更。**
- [restaurant-rsv1]名のリポジトリ―を GITHUB にて作成

★ターミナルより以下コマンドでローカルリポジトリのデータをリモートリポジトリに反映  
- `$ git add .`  
- `$ git commit -m "リモートリポジトリの変更"`  
- `$ git push origin main`  

**DOCKERをビルドする**  
- `$ cd restaurant-rsv1`  
- `$ docker-compose up -d --build`  
- `$ code .`  
- DockerDesktop アプリを立ち上げる.  
　コンテナに[restaurant-rsv1]が存在し、稼働していればOK

**LARAVEL 環境構築**  
- `$ docker-compose exec php bash`  
- `$ composer install`  
- `$ exit`

- .env (.env.test   .env.prod )に以下の環境変数を追加

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

★アプリケーションキーの作成  
- `＄ docker-compose exec php bash`
- `＄ php artisan key:generate`

★マイグレーションの実行  
- `＄ docker-compose exec php bash`  
- `＄ php artisan migrate`

★シーディングの実行  
- `＄ docker-compose exec php bash`  
- `＄ php artisan db:seed`  
  ※ シーディングをやり直す場合は  
  - `＄php artisan migrate:fresh` を先に行って  
  - `$ php artisan db:seed`を実行  
 シーダーで作成するデータ  
   １.users  
     ①管理者          admin@gmail.com  
     ②店舗管理者会員   20ユーザを登録  
    　　　　　　shop0001@gmail.comから  
    　　　　　　shop0002@gmail.com  
    　　　　　　　　　　・  
    　　　　　　　　　　・  
    　　　　　　　　　　・  
    　　　　　　shop0020@gmail.com  
     ③一般会員        17ユーザを登録  
    　　　　　　aa@gmail.com  
    　　　　　　bb@gmail.com  
    　　　　　　cc@gmail.com  
    　　　　　　　　　　・  
    　　　　　　　　　　・  
    　　　　　　　　　　・  
    　　　　　　qq@gmail.com  
    　　　※ログイン初期パスワードは全て password  
    2.shops  
    　　店舗管理者会員と連動連動して20店舗を登録  
    ３.areas  
      全国都道府県を登録  
    4.genres  
    　　1 イタリアン  
    　　2 ラーメン  
    　　3 居酒屋  
    　　4 寿司  
    　　5 焼肉  


**追加実装項目(補足）**

- 予約変更機能  
     各一般ユーザーでログインし、左上のメニューからマイページ  
     の予約一覧より、予約修正を押下。  
- バリデーション  
    会員登録ページ  
    ログインページ  
    飲食店詳細ページ（予約登録）  
    予約修正ページ  
    お知らせメール送信ページ  
    店舗管理者会員登録ページ  
    店舗管理者用店舗情報修正ページ  
    店舗管理者用店舗情報登録ページ  

- レスポンシブデザイン  
   タブレット・スマートフォンでも表示が崩れないよう調整  
   ブレイクポイントは768px

- 管理画面  
    - 管理者アカウントについては、admin@gmail.comにてシーダーで登録される。（初期パスワード  password）  
    - 店舗管理者については、管理者でログイン後、メニューの「ShopManager-Registration」を押下し
    店舗管理者登録ページから登録を行う。  
    - 店舗管理者は、管理者権限でないと登録できない。  
    - 店舗管理者会員については、登録後、一般会員と同様、メールにより認証される。  
    - 店舗管理者は、アカウントが登録され、メール認証が行われたら、ログインし店舗情報登録を実施。  
    - 店舗管理者で、ログイン後、左上のメニュー「ShopContents-New」から店舗情報を新規登録。  
    - また、店舗管理者は、すでに登録してある店舗情報を更新することができる。  
    - 店舗管理者で、ログイン後、左上のメニュー「ShopContents-Edit」から店舗情報を編集更新ができる。  

- ストレージ  
    - 保存場所:①[restaurant-rsv1]/src/storage/app/public/  
    - 表示用:②[restaurant-rsv1]/src/public  

       ※②から①にシンボリックを張っている
- 認証  
     一般会員。店舗管理者会員についてはアカウントを登録すると、メール認証が送信され、メールで認証することによって、使用することができるようになる。  
     認証メールはMAILHOGにて確認可能。
     http://localhost:8025

- メール送信  
     店舗管理者権限でログイン後、左上のメニューより「Notice-Email」を選択。
     お気に入り登録している会員に対して、同報される。

- リマインダー  
    ★手動の場合  
     - `$ docker-compose exec php bash;`  
     - `$ php artisan send:reservation-reminders`  
    ★自動の場合
     - `$ docker-compose exec php bash -c "php artisan send:reservation-reminders"`  
     上記のコマンドを各サーバのスケジューラ（クーロン）に登録し自動実行

- QRコード  
    予約者は、自分のマイページより、対象店舗の予約情報からQR表示を押下する。  
    店舗側は、QRコードを読み取ると予約画面が表示され照合できる。ただし、事前に店舗側はログインしておく必要がある。

    
- 環境の切り分け  
  - .env ファイルについては以下の内容を直接.envに記載するのではなく
    予め、以下のファイルを作成。

  - テスト環境用  .env.testを作成   $ cp .env.example .env.test
  - 本番環境用    .env.prodを作成   $ cp .env.example .env.prod

  - テスト環境   環境変数を記載  
      ```
      APP_NAME=Laravel
      APP_ENV=local
      APP_KEY=base64:NZ1wsgKrZR3Xbkk/NXUngH+p5On6th96xDFluJBQYEo=
      APP_DEBUG=true
      APP_URL=http://localhost

      LOG_CHANNEL=stack
      LOG_DEPRECATIONS_CHANNEL=null
      LOG_LEVEL=debug

      DB_CONNECTION=mysql
      DB_HOST=mysql
      DB_PORT=3306
      DB_DATABASE=laravel_db%{#ffdc00}
      DB_USERNAME=laravel_user
      DB_PASSWORD=laravel_pass

      BROADCAST_DRIVER=log
      CACHE_DRIVER=file
      FILESYSTEM_DRIVER=local
      QUEUE_CONNECTION=sync
      SESSION_DRIVER=file
      SESSION_LIFETIME=120

      MEMCACHED_HOST=127.0.0.1

      REDIS_HOST=127.0.0.1
      REDIS_PASSWORD=null
      REDIS_PORT=6379

      MAIL_MAILER=smtp
      MAIL_HOST=mailhog
      MAIL_PORT=1025
      MAIL_USERNAME=null
      MAIL_PASSWORD=null
      MAIL_ENCRYPTION=null
      MAIL_FROM_ADDRESS=info@example.com
      MAIL_FROM_NAME="${APP_NAME}"

      AWS_ACCESS_KEY_ID=
      AWS_SECRET_ACCESS_KEY=
      AWS_DEFAULT_REGION=us-east-1
      AWS_BUCKET=
      AWS_USE_PATH_STYLE_ENDPOINT=false

      PUSHER_APP_ID=
      PUSHER_APP_KEY=
      PUSHER_APP_SECRET=
      PUSHER_APP_CLUSTER=mt1

      MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
      MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
      ```
    以下、修正箇所。
      ```
      DB_CONNECTION=mysql
      DB_HOST=mysql
      DB_PORT=3306
      DB_DATABASE=laravel_db
      DB_USERNAME=laravel_user
      DB_PASSWORD=laravel_pass

      修正後、.env.testから .envにコピー
    $ cp .env.test .env
    ```
  - 本番環境用であれば、.env.prodに以下の環境変数を記載
    ```
     APP_NAME=Laravel
     APP_ENV=product
     APP_KEY=base64:sskyua48U0ODeaDEe4LsijE3ePedP5rrqUqh4v/DrUg=
     APP_DEBUG=FALSE
     APP_URL=

     LOG_CHANNEL=stack
     LOG_DEPRECATIONS_CHANNEL=null
     LOG_LEVEL=debug

     DB_CONNECTION=mysql
     DB_HOST=database-1.cf4koi8qu5r4.ap-northeast-3.rds.amazonaws.com
     DB_PORT=3306
     DB_DATABASE=laravel_db
     DB_USERNAME=
     DB_PASSWORD=

     BROADCAST_DRIVER=log
     CACHE_DRIVER=file
     FILESYSTEM_DRIVER=local
     QUEUE_CONNECTION=sync
     SESSION_DRIVER=file
     SESSION_LIFETIME=120

     MEMCACHED_HOST=127.0.0.1

     REDIS_HOST=127.0.0.1
     REDIS_PASSWORD=null
     REDIS_PORT=6379

     MAIL_MAILER=smtp
     MAIL_HOST=localhost
     MAIL_PORT=1025
     MAIL_USERNAME=null
     MAIL_PASSWORD=null
     MAIL_ENCRYPTION=null
     MAIL_FROM_ADDRESS=info@example.com
     MAIL_FROM_NAME="${APP_NAME}"

     AWS_ACCESS_KEY_ID=
     AWS_SECRET_ACCESS_KEY=
     AWS_DEFAULT_REGION=ap-northeast-3
     AWS_BUCKET=takatsutsu-aws-fileserver-07
     AWS_USE_PATH_STYLE_ENDPOINT=false

     PUSHER_APP_ID=
     PUSHER_APP_KEY=
     PUSHER_APP_SECRET=
     PUSHER_APP_CLUSTER=mt1

     MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
     MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

     DB_CONNECTION=mysql
     DB_HOST=mysql
     DB_PORT=3306
     DB_DATABASE=laravel_db
     DB_USERNAME=laravel_user
     DB_PASSWORD=laravel_pass
    ```
    本番環境の場合、.env.prodから .envにコピー  
     $ cp .env.prod .env  
     コピー後、以下の項目は環境によって異なるため各自で設定。  
     また機密情報のためGITHUBにあげるときは、以下項目は記載しないよう留意する。

    ```
      APP_URL=

      DB_USERNAME=admin
      DB_PASSWORD=

      AWS_ACCESS_KEY_ID=
      AWS_SECRET_ACCESS_KEY=
　
**ログイン権限による左メニューの違い**  
  - ログインしていない場合  
       ①Home  
       ②Registration　　(一般会員登録ページ)  
       ③Login  
  - 管理者でログインしている場合  
       ①Home  
       ②Logout  
       ③ShopManager-Registration　　(店舗管理者会員登録ページ)   
  - 店舗管理者会員でログインしている場合  
    - 店舗情報が登録されている場合  
       ①Home  
       ②Logout  
       ③ShopContents-Edit　　(店舗情報修正ページ)   
       ④Notice-Email　　（お知らせメール送信ページ）  
       ⑤Reservation-Info　　（店舗別予約情報）  
    - 店舗情報が登録されていない場合  
       ①Home  
       ②Logout  
       ③ShopContents-New　　(店舗情報登録ページ)  
  - 一般会員でログインしている場合  
       ①Home  
       ②Logout  
       ③MyPage  (一般会員マイページ)





