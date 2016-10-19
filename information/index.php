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

$userid = '57ff490fb44439ac4305b120';
$theObjId = new MongoId($userid);
//$query = array( "_id" => $theObjId );

/*if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array( '_id' => new \MongoId('57ff490fb44439ac4305b120') );
}*/

$cursor = $collection->find( array( "title" => "De kracht van de wortel" ) );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'title'=>$item['title'],
        'text'=>$item['text'],
        'date'=>$item['data']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);