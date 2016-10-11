<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 8-10-2016
 * Time: 16:01
 */
require 'vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

// Part 1: check if these HTTP-requests work, we perform a GET.
$tekst = "We gaan hier kijken of de get-request op het pseudojson.html-bestandje werkt.<br/>";
echo $tekst;


// Create client with Base-URI in it (referring to our cloud environment)
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    // You can set any number of default request options - since the cloud responds a bit shaggy sometimes, I put 10.0.
    'timeout'  => 10.0,
]);

// GET: that pseudojson.html file
$response = $client->get('http://crassus-php.azurewebsites.net/meta/pseudojson.html');

$code = $response->getStatusCode(); // Can be 200
$reason = $response->getReasonPhrase(); // Can be OK

// An echo with success or not
if ($response->hasHeader('Content-Length')) {
    echo "SUCCESS. <br/>Code:",$code,"<br/>Reason:",$reason,"<br/>";
} else {
    echo "FAILURE. </br>Code:\",$code,\"<br/>Reason:\",$reason","<br/>";
}

// Part 2: check if we can read from the database. Use the MongoDB-credentials as provided here to connect
$client = new MongoDB\Client(
    'mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus'
);
$dbname = 'crassus';
$collname = 'questions';

// Get the collection to read from.
$collection = $client->$dbname->$collname;

// Set up cursor (i.e. kind of like a query): find every document where question_nr is 1
$result = $collection->find( [ 'week_nr' => 2 ] );

// Show all found results (documents), by showing document ID and question_nr
foreach ($result as $entry) {
    echo 'Document ID:', $entry['_id'], '<br/>Question_nr:', $entry['question_nr'], "<br/>";
    echo json_encode($entry);
    echo 'gekkigheid';
    //json_encode($entry);
}

?>