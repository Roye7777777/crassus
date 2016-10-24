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

$client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->request('PUT', 'http://crassus-php.azurewebsites.net/edit_user/', [
    'json' => ['name' => $_PUT['name'], 'age' => $_PUT['age']]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}
?>