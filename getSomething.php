<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 11-10-2016
 * Time: 10:49
 */
require 'vendor/autoload.php';
// here it's not used, but ok, to make phpstorm stop complaining
// use GuzzleHttp\Client;

$client = new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname = 'crassus';
$collname = 'questions';

// Get the collection to read from.
$collection = $client->$dbname->$collname;

// Set up cursor (i.e. kind of like a query): find every document where question_nr is 1
$result = $collection->find( [ 'question_nr' => 1 ] );


?>