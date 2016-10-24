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

$name = strval($_POST['name']);
$age = strval($_POST['age']);
$gender = strval($_POST['gender']);
$weight = strval($_POST['weight']);
$length = strval($_POST['length']);

$client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->request('POST', 'http://crassus-php.azurewebsites.net/post/', [
    'json' => [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
        'weight' => $weight,
        'length' => $length
    ]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}
?>