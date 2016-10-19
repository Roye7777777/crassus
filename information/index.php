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
// This $query will be the content that comes between
$query = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array('_id' => new MongoDB\BSON\ObjectId($var) );
}

if (!is_null($_GET['tags'])) {
    $var = $_GET['tags'];
    $tags = explode(' ', $var);
    $tagsList = array();
    for ($x = 0; $x < count($tags); $x++) {
        array_push($tagsList, array('tags' => $tags[$x]));
    }
    $query = array( '$and' => $tagsList );
}

$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'title'=>$item['title'],
        'text'=>$item['text'],
        'date'=>$item['data'],
        'tags'=>$item['tags']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);