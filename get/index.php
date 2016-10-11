<?php
require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='questions';
$collection=$client->$dbname->$collname;
$var = $_GET['nr'];
$result=$collection->find([ 'question_nr' => $var ]);
header('Content-Type:application/json;charset=utf-8');
foreach ($result as $entry) {echo json_encode($entry);}
?>