After Cloning

# Install dependencies
composer install

# Set up .env and generate key
cp .env.example .env
php artisan key:generate
cd database
New-Item database.sqlite -ItemType File
cd ..
php artisan migrate:fresh --seed
php artisan serve

open localhost:8000