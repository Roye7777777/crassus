<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 13-10-2016
 * Time: 10:28
 */
require '../../db.php';
$collname='questions';
$collection=$dbclient->$dbname->$collname;
$var = 1;
header('Content-Type:application/json;charset=utf-8');

$query = array();

if (!is_null($_GET['week_nr'])) {
    $var = intval($_GET['week_nr']);
    $query = array( 'week_nr' => $var );
}

$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item) {
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'week_nr'=>$item['week_nr'],
        'question_nr'=>$item['question_nr'],
        'question'=>$item['question'],
        'options'=>$item['options']
    );
    $i++;
}

if (count($return) === 0) {
    http_response_code(404);
    die(json_encode(array("Status","No challenges found")));
}

echo json_encode($return, JSON_FORCE_OBJECT);
?>
