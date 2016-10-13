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
$var = 1;
if (!is_null($_GET['week_nr'])) {
    $var = intval($_GET['week_nr']);
}
header('Content-Type:application/json;charset=utf-8');
$result = $collection->find( [ 'week_nr' => $var ] );
foreach ($result as $entry) {
    //echo 'Document ID:', $entry['_id'], '<br/>Question_nr:', $entry['question_nr'], "<br/>";
    echo json_encode($entry);
}
?>