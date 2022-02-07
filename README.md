# Usage

Run the following to set up the local development environment.
```bash
git clone https://github.com/zaronologyinc/booklist-assesment;
cd booklist-assesment;
php artisan key:generate;
composer install;
npm install;
php artisan migrate;
php artisan db:seed;
composer dump-autoload -o;
php artisan serve;
npm run watch;
```
