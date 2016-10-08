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
    'base_uri' => 'http://httpbin.org',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);
$response = $client->get('http://httpbin.org/get');
$code = $response->getStatusCode(); // 200
$reason = $response->getReasonPhrase(); // OK

echo $code;
echo $reason;
?>