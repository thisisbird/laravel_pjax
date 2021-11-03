
## 安裝pjax
* composer require spatie/laravel-pjax

1. RouteServiceProvider.php //網址前綴 對應route 設定
2. Authenticate.php AuthenticateBackend.php //未登入時導回頁面設定
3. auth.php //登入帳號 前後端session設定


## 可參考(未使用)
* https://github.com/defunkt/jquery-pjax


## 靜態模板
網址/mazer-1.1/dist/index.html

## 建立資料夾連結
  php artisan storage:link