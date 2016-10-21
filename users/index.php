<?php
/**
 * Created by PhpStorm.
 * User: Emiel
 * Date: 19-10-2016
 * Time: 10:31
 */
require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='users';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$cursor = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $cursor = array( '_id' => new MongoDB\BSON\ObjectId($var) );
}

$result = $collection->find( $cursor );

foreach ($result as $entry) {
    echo json_encode($entry);
}

?>