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

if( empty($_POST['name']) || empty($_POST['age']) ) {
    echo 'Ik heb niks';
} else {
    echo $_POST['name'], ', ';
    echo $_POST['age'], '<br/>';
    $client = new Client(['base_uri' => 'http://crassus-php.azurewebsites.net']);
    $response = $client->request('POST', 'http://crassus-php.azurewebsites.net/add_user/', [
        'json' => ['name' => $_POST['name'], 'age' => $_POST['age']]
    ]);
    $code = $response->getStatusCode();
    echo $code;
    if ($response->hasHeader('Content-Length')) {
        echo "It exists";
    }
}
?>