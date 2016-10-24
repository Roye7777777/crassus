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

echo $_POST['name'];
$name = isset($_POST['name'])? htmlspecialchars(trim($_POST['name'])) : "";
$age = isset($_POST['age'])? (int)htmlspecialchars(trim($_POST['age'])) : "";
$gender = isset($_POST['gender'])? htmlspecialchars(trim($_POST['gender'])) : "";
$weight = isset($_POST['weight'])? (double)htmlspecialchars(trim($_POST['weight'])) : "";
$length = isset($_POST['height'])? (double)htmlspecialchars(trim($_POST['height'])) : "";

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