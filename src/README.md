# お問い合わせフォーム

## 環境構築

### Dockerビルド

1. `git clone https://github.com/sumin341028/Confirmation-test.git`
2. `docker-compose up -d --build`

※ MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせて `docker-compose.yml` ファイルを編集してください。

### Laravel準備構築

1. `docker-compose exec php bash`
2. `composer install`
3. `.env.example` ファイルから `.env` を作成し、環境変数を変更
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`

## ER図

![ER図](contact_er_drawio.png)

## 使用技術

- PHP 8.0  
- Laravel 10.0  
- MySQL 8.0  

## URL

- 開発環境： http://localhost/  
- phpMyAdmin： http://localhost:8080/