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

$name = isset($_POST['name'])? urlencode(trim($_POST['name'])) : "";
$age = isset($_POST['age'])? (int)urlencode(trim($_POST['age'])) : "";
$gender = isset($_POST['gender'])? urlencode(trim($_POST['gender'])) : "";
$weight = isset($_POST['weight'])? (double)urlencode(trim($_POST['weight'])) : "";
$length = isset($_POST['length'])? (double)urlencode(trim($_POST['length'])) : "";

echo $name, ', ', gettype($name);

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