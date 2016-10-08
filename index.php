<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 8-10-2016
 * Time: 16:01
 */
require 'vendor/autoload.php';

use GuzzleHttp\Client;

echo "Gompes! Allemaggies wat mooi!";
// Create a client with a base URI
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://crassus-php.azurewebsites.net/',
    // You can set any number of default request options.
    'timeout'  => 30,
]);

echo "boe 1!";

$response = $client->get('http://crassus-php.azurewebsites.net/');

echo "boe 2!";
echo $response;

$code = $response->getStatusCode(); // kan 200 zijn
$reason = $response->getReasonPhrase(); // OK

echo $code;
echo $reason;
?>