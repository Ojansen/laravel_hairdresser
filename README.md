# laravel hairdresser
a laravel website/ app for hairdressers

## install
in order to use the website locally, you need to install composer and XAMPP if you didn't have that already.

[composer](https://getcomposer.org/)<br/>
[XAMPP](https://www.apachefriends.org/index.html)

then clone the project:  

```git clone https://github.com/Ojansen/laravel_hairdresser.git```  

go into the project and install laravel  

``cd laravel_hairdresser``  

``composer install laravel``  

after that you should see an ``.env `` file with some configuration. first you need to greate a random key with the following command:
``php artisan key:generate``  

For the database you're useing MYSQL, XAMPP host the needed apache2 and mysql servers, start the 2 servers and go to   ``localhost/phpmyadmin`` in there you create a new database and call it ``hairdresser``   

In your ``.env`` file you should edit the following to mach this:  

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>  
DB_DATABASE=hairdresser<br>  
DB_USERNAME=root<br>  
DB_PASSWORD=<br>  

then run the migration like so  
``php artisan migrate --seed``

this creates al the database entries you'll need. Adn seeds the tables with random data.

now you can use the webapp 
