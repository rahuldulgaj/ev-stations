# ev-stations


 Download or copy the GIT 
 # Frameworks
  Laravel 7.0
  Materialize
   Admin BSB Material Design
   EV is a simple PHP script based on Laravel that helps you to manage small or medium EV STATION .


  # Install
git clone https://github.com/rahuldulgaj/ev-stations.git
cd ev-station
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve