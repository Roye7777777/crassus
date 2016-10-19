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
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='information';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$cursor = array();

if (!is_null($_GET['tags'])) {
    $var = $_GET['tags'];
    $tags = explode(' ', $var);
    $tagsList = array();
    for ($x = 0; $x < count($tags); $x++) {
        array_push($tagsList, array('tags' => $tags[$x]));
    }
    $cursor = array( '$and' => $tagsList );
}

$result = $collection->find( $cursor );

$json_result = [];
foreach ($result as $entry) {
    echo $entry;

    array_push($json_result, json_encode($entry));
}
echo json_encode($json_result);
?>