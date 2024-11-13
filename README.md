## CATATAN
Buat database 'webalumnidb'<br>
Buat file '.env'<br>
Copy isian '.env.example' ke '.env'<br>

composer install<br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan serve<br>

## SEEDING
composer install<br>
php artisan migrate:fresh<br>
php artisan db:seed<br>
- Seed 1 berita dan 1 admin (127.0.0.1:8000/admin)
- View berita melalui url 127.0.0.1:8000 (mis. 127.0.0.1:8000/1)
- Admin email: user123@gmail.com password: 12345678