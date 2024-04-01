# 起動方法

## 1. プロジェクトのクローン

```bash
git clone git@github.com:riya-amemiya/laravel_omikuzi.git
```

## 2. パッケージのインストール

```bash
cd laravel_omikuzi
composer install
```

## 3. 環境変数の設定

```bash
cp .env.example .env
```

## 4. アプリケーションキーの生成

```bash
php artisan key:generate
```

## 5. データベースの設定

sqliteを使っているので、データベースの設定は不要です。

## 6. マイグレーション

```bash
php artisan migrate
```

## 7. サーバーの起動

```bash
php artisan serve
```
