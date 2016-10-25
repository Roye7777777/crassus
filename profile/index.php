<?php
/**
 * Created by PhpStorm.
 * User: Emiel
 * Date: 10/20/2016
 * Time: 2:34 PM
 */

require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$query = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array( '_id' => new MongoDB\BSON\ObjectId($var) );
}

$cursor = $collection->find( $query );
$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'name'=>$item['name']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);