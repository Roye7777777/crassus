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
$query = $collection->find( [] );
if (!is_null($_GET['week_nr'])) {
    $var = intval($_GET['week_nr']);
    $query = $collection->find( [ 'week_nr' => $var ] );
}
header('Content-Type:application/json;charset=utf-8');

$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    if (is_null($item['week_nr']))
        return;

    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'week_nr'=>$item['week_nr'],
        'question_nr'=>$item['question_nr'],
        'question'=>$item['question'],
        'options'=>$item['options']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);
?>
