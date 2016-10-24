<?php
/**
 * Created by PhpStorm.
 * User: Jobie
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
$collname='challenges';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$query = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array( '_id' => $var );
}
// kom
$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item) {
//    if (is_null($item['week_nr']))
//        return;
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'title'=>$item['title'],
        'week_nr'=>$item['week_nr']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);
?>