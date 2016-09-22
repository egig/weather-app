<?php

file_exists($configFile = __DIR__.'/config.php')
  or die("ERROR ! config.php does not exist.
  Please create config file 'config.php' in ". __DIR__.
  ",  you can copy from ". __DIR__."/config.php.dist");

require_once __DIR__ .'/vendor/autoload.php';

$app = require_once __DIR__.'/src/WeatherApp.php';
$app['config'] = require_once $configFile;
$app->run();
