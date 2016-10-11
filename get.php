<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 11-10-2016
 * Time: 10:52
 */
require 'vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->get('http://crassus-php.azurewebsites.net/getSomething.php');

$code = $response->getStatusCode(); // Can be 200
$reason = $response->getReasonPhrase(); // Can be OK
echo $code;
echo $reason;
echo $response;
?>