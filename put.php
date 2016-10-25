<?php
/**
 * Created by PhpStorm.
 * User: Emiel
 * Date: 10/23/2016
 * Time: 11:43 AM
 */

require 'vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

if (!isset($_PUT['name'])) {
    die([400, 'No content']);
}
$name = isset($_PUT['name']) ? str_replace(' ', '_', $_PUT['name']): "";
$age = isset($_PUT['age']) ? (int)$_PUT['age']: "";

$client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->request('PUT', 'http://crassus-php.azurewebsites.net/put/', [
    'json' => ['name' => $name, 'age' => $age]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}
?>