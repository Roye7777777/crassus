<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 8-10-2016
 * Time: 16:01
 */
require 'vendor/autoload.php';

use GuzzleHttp\Client;

echo "Gompes!";
// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'http://crassus-php.azurewebsites.net/']);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'test');
// Send a request to https://foo.com/root
//$response = $client->request('GET', '/root');
?>