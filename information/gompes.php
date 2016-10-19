<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 19-10-2016
 * Time: 12:06
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
$query = array();
$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        'title'=>$item['title'],
        'text'=>$item['text'],
        'date'=>$item['data']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);