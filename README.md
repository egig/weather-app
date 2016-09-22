# WeatherApp

## Quick Deployment Instruction
1. download source code here:
2. extract in document root, e.g `var/www/html` on linux or `C:\\xampp\htdocs` on windows
3. application folder would be named `weatherapp`
4. make file `config.php` in application folder with following content:

        <?php return array(
          'api_key' => 'YOUR_API_KEY_HERE'
        );
    Change YOUR_API_KEY_HERE with api key you got from http://openweathermap.org/api
5. done
6. Visit your web server, e.g `http://localhost:8000/weatherapp`.


## Developer Installation
1. Make sure you have `Composer` installed.
2. from terminal:

        git clone https://github.com/egig/weatherapp.git
        cd weatherapp
        composer install
        cp config.php.dist config.php

3. edit file `config.php`

        <?php return array(
          'api_key' => 'YOUR_API_KEY_HERE'
        );
    Change YOUR_API_KEY_HERE with api key you got from http://openweathermap.org/api
5. run server
        php -S localhost:8000
6. Visit http://localhost:8000.
