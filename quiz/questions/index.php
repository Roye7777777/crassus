<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 13-10-2016
 * Time: 10:28
 */
require '../../vendor/autoload.php';
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
$result = $collection->find( [] );
if (!is_null($_GET['week_nr'])) {
    $var = intval($_GET['week_nr']);
    $result = $collection->find( [ 'week_nr' => $var ] );
}
header('Content-Type:application/json;charset=utf-8');

$json_result = array();
foreach ($result as $entry) {
    array_push($json_result, json_encode($entry));
}
?>
echo $json_result;
