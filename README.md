# Framework Laravel versi 12.20.0

# Prasyarat
- Git
- PHP 8.4.6
- composer
- DBMS PostgreSQL

# Cara running
- Run command `php --version` di command prompt. Kemudian buka file php.ini
- Uncomment extension=pdo_pgsql
- Run command `git clone https://github.com/dimassp/herca.git` di command prompt
- Run command `cd herca` di command prompt
- Copy file .env.example dan ganti namanya jadi .env
- Sesuaikan konfigurasi databasenya. Untuk konfigurasi databasenya diawali dengan DB_. Pastikan DB_CONNECTION-nya pgsql
- Run command `composer install` di command prompt
- Run command `php artisan migrate` di command prompt
- Run command `php artisan db:seed` di command prompt
- Run command `php artisan serve` di command prompt