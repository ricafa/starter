#Run project
composer install
php artisan migrate
php artisan serve

#Api documentation on 
http://localhost:8000/swagger/index.html

#Run PHPUnit tests with:
vendor\bin\phpunit 

#TO DO
* test coverage{variation}
* complete documentation with OpenAPI(Swagger)