<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 8-10-2016
 * Time: 16:01
 */
require 'db.php';
// Part 1: check if these HTTP-requests work, we perform a GET.
$tekst = "We gaan hier kijken of de questions-request op het pseudojson.html-bestandje werkt.<br/>";
echo $tekst;

// GET: that pseudojson.html file
$response = $apiclient->get('http://crassus-php.azurewebsites.net/meta/pseudojson.html');

$code = $response->getStatusCode(); // Can be 200
$reason = $response->getReasonPhrase(); // Can be OK

// An echo with success or not
if ($response->hasHeader('Content-Length')) {
    echo "SUCCESS. <br/>Code:",$code,"<br/>Reason:",$reason,"<br/>";
} else {
    echo "FAILURE. </br>Code:\",$code,\"<br/>Reason:\",$reason","<br/>";
}
$collname = 'questions';

// Get the collection to read from.
$collection = $dbclient->$dbname->$collname;

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