<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 13-10-2016
 * Time: 10:31
 */
require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);

if (is_null($_GET['name']) || is_null($_GET['age'])) {
    return 'FAILED';
} else {
    $client = new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
    $dbname = 'crassus';
    $collname = 'users';
    $collection = $client->$dbname->$collname;
//header('Content-Type:application/json;charset=utf-8');
// This $query will be the content that comes between
    $query = array('name' => $_GET['name'], 'age' => $_GET['age']);

    $cursor = $collection->insertOne($query);
    $insertOne = $collection->insertOne($query);

    printf("Inserted %d document(s)\n", $insertOne->getInsertedCount());
    var_dump($insertOne->getInsertedId());
}