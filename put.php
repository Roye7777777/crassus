<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 21-10-2016
 * Time: 12:23
 */
require 'vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->request('PUT', 'http://crassus-php.azurewebsites.net/put/', [
    'json' => ['name' => $_PUT['name'], 'age' => $_PUT['age']]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}
?>