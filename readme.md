# Bitni koraci za pokrenuti projekt
- Skopirati .env.example u .env, editirati podatke o bazi: DB_DATABASE, DB_USER, DB_PASSWORD
- $ php artisan key:generate
- Kreirati bazu lokalno na kompu kroz npr. phpmyadmin
- Pokrenuti migracije baze: $ php artisan migrate
- Za lokalni server: $ php artisan serve
