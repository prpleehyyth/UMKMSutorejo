Dokumentasi Setup Project

1. Clone Repository
git clone https://github.com/prpleehyyth/UMKMSutorejo.git
cd UMKMSutorejo

2. Install PHP & JS Dependencies
composer install
npm install
php artisan key:generate
php artisan storage:link

3. Atur koneksi database di .env

4. php artisan migrate

5. php artisan serve