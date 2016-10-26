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
if (isset($_GET['id'])) {
    foreach ($collection->find() as $item) {
        if (new MongoDB\BSON\ObjectId($_GET['id']) == $item['_id']) {
            $query = array(
                '_id' => utf8_encode($item['_id']),
                'age' => $item['age'],
                'name' => $item['name'],
            );
            break;
        }
    }
} else {
    foreach ($collection->find() as $item) {
        $query = array(
            '_id' => utf8_encode($item['_id']),
            'age' => $item['age'],
            'name' => $item['name'],
        );
    }
}
echo json_encode($query, JSON_FORCE_OBJECT);
?>