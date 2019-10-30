# laravel_hairdresser
a laravel website for hairdressers

## install
in order to use the website locally, you need to install composer if you didn't have that already.

[composer](https://getcomposer.org/)

then clone the project:

```git clone https://github.com/Ojansen/laravel_hairdresser.git```

go into the project and install laravel

``cd laravel_hairdresser``

``composer install laravel``

after that you should see an ``.env `` file with some configuration. edit that so it connects to a mysql database.
then run the migration like so
``php artisan migrate --seed``

this creates al the database entries you'll need.

now you can use the webapp 
