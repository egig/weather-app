<?php

date_default_timezone_set("Asia/Jakarta");

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app['config'] = [];

$client = new Client(['base_uri' => 'http://api.openweathermap.org/data/2.5/weather?']);

$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__
));

/**
 * Create the routes
 */
$app->get('/', function (Request $request) use ($app, $client) {

    $cityOptions = array(
      array('id'=> 1642911, 'name'=>'Jakarta'),
      array('id'=> 1650357, 'name'=>'Bandung'),
      array('id'=> 1625822, 'name'=>'Surabaya'),
      array('id'=> 1609350, 'name'=>'Bangkok'),
      array('id'=> 1880252, 'name'=>'Singapore'),
      array('id'=> 5128638, 'name'=>'New York'),
    );

    $cityId = $request->query->get('city_id');
    $appId = $app['config']['api_key'];

    $response = $client->request('GET', '?id='.$cityId.'&appid='.$appId);

    $data = json_decode($response->getBody());

    $date = date("d F Y ");

    return $app['twig']->render('weather.twig', array(
        'cities' => $cityOptions,
        'date' => $date,
        'cityId' => $cityId,
        'data' => $data,
    ));
});

return $app;
