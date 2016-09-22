<?php

require_once __DIR__ .'/../vendor/autoload.php';

use Silex\WebTestCase;

class WeatherAppTest extends WebTestCase
{
    public function createApplication()
    {

        $app = require __DIR__.'/../src/WeatherApp.php';
        $app['debug'] = true;
        $app['config'] = require_once __DIR__.'/../config.php';
        unset($app['exception_handler']);

        return $app;
    }

    public function testPageContainsProperResult()
    {
      $client = $this->createClient();

      // test form
      $crawler = $client->request('GET', '/');

      $this->assertTrue($client->getResponse()->isOk());
      $this->assertCount(1, $crawler->filter('form'));
      $this->assertGreaterThan(3, count($crawler->filter('option')));

      // test results
      $crawler = $client->request('GET', '/?city_id=1642911'); // Jakarta

      $this->assertTrue($client->getResponse()->isOk());
      $this->assertContains('Jakarta', $client->getResponse()->getContent());
    }
}
