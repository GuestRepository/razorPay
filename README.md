required -laravel-9
required - php version 8.1.2

1.composer install 
2.cp .env.example .env
3.php artisan key:generate
4.php artisan migrate --seed
5.php artisan migrate:reset (no need use any time)
6.register in  razorpay account  -  https://dashboard.razorpay.com/signup?
7.After register you can get key