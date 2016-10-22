<?php
/** 
 * Created by PhpStorm. 
 * User: martijnbeljaards 
 * Date: 11-10-16 
 * Time: 13:12 
 */

require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);

$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='food_diaries';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
// This $query will be the content that comes between
$query = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array('_id' => new MongoDB\BSON\ObjectId($var) );
}

$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'breakfast'=>$item['breakfast'],
        'lunch'=>$item['lunch'],
        'dinner'=>$item['dinner'],
        'snacks'=>$item['snacks'],
        'post_date'=>$item['post_date'],
        'number_week'=>$item['number_week'],
        'users_id'=>utf8_decode($item['users_id'])
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);