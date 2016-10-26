<?php
/**
 * Created by PhpStorm.
 * User: Jobie
 * Date: 13-10-2016
 * Time: 10:31
 */

require '../db.php';
$collname='challenges';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$query = array();

if (!is_null($_GET['week_nr'])) {
    $var = $_GET['week_nr'];
    $query = array( 'week_nr' => $var );
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