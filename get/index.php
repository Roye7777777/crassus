<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 11-10-2016
 * Time: 11:52
 */

require '../vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

// Create client with Base-URI in it (referring to our cloud environment)
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    // You can set any number of default request options - since the cloud responds a bit shaggy sometimes, I put 10.0.
    'timeout'  => 10.0,
]);

$client = new MongoDB\Client(
    'mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus'
);
$dbname = 'crassus';
$collname = 'questions';

// Get the collection to read from.
$collection = $client->$dbname->$collname;

// Set up cursor (i.e. kind of like a query): find every document where question_nr is 1
$result = $collection->find();
header('Content-Type: application/json');

// Show all found results (documents), by showing document ID and question_nr
foreach ($result as $entry) {
    echo json_encode($entry);
}
?>