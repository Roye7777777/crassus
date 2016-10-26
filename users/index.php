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
$i = 0;
$return = [];
if (isset($_GET['id'])) {
    if (strlen($_GET['id']) !== 24) {
        http_response_code(400);
        die('Invalid Id');
    }

    $check = false;
    foreach ($collection->find() as $item) {
        if (new MongoDB\BSON\ObjectId($_GET['id']) == $item['_id']) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'age' => $item['age'],
                'name' => $item['name'],
            );
            $check = true;
            break;
        }
    }
    if (!$check) {
        http_response_code(400);
        die('No User found for this Id');
    }
} else {
    foreach ($collection->find() as $item) {
        $return[$i] = array(
            '_id' => utf8_encode($item['_id']),
            'age' => $item['age'],
            'name' => $item['name'],
        );
        $i++;
    }
}

echo json_encode($return, JSON_FORCE_OBJECT);
?>