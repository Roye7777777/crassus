<?php
/**
 * Created by PhpStorm.
 * User: Emiel
 * Date: 19-10-2016
 * Time: 10:31
 */
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$query = array();

$test = $collection->find( [ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ] );
    if (!is_null($_GET['id']) && ($test->count() === 0)) {
        $var = $_GET['id'];
        $query = array('_id' => new MongoDB\BSON\ObjectId($var));
        echo 'id bestaat niet';
    }

    if (!is_null($_GET['id']) && ($test->count() != 0)) {
        $var = $_GET['id'];
        $query = array('_id' => new MongoDB\BSON\ObjectId($var));
        echo 'id bestaat';
    }
$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'age'=>$item['age'],
        'name'=>$item['name'],
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);

?>