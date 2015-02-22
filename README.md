# regeneration-character
Character package for regeneration

Installation / Usage
--------------------

1. Install via composer in the root directory of a Laravel 5 application

    ``` sh
    $ composer require regeneration/character
    ```

2. Add the following line to /config/app.php inside the 'providers' array to use the service provider

    ``` php
   'Regeneration\Character\CharacterServiceProvider',
    ```

3. Run Composer update in the root directory: `composer update`
4. Navigate to the URL provided in the commandline and you should now see the package installation success page.

== CLI commands for this package ==
1) Run the following command in the root directory of your laravel installation:
php artisan controller:make NewController --bench=regeneration/character

2) Add the following line after the first php opening tag of the newly generated file inside the packages `controller` folder
namespace Regeneration\Character\Controllers;

3) Run the following command in the root directory and your package directory
composer dump-autoload

=== Accessing admin area ===
Admin controller is restful, therefore has following pages available:
/character/manage/ 
/character/manage/create
/character/manage/{lobby_id}
/character/manage/{lobby_id}/edit