<?php
/**
 * Created by PhpStorm.
 * User: JobieONE
 * Date: 19-10-2016
 * Time: 10:31
 */
require '../db.php';
$collname='challenges';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$i = 0;
$return = [];
if (isset($_GET['id'])) {
    if (strlen($_GET['id']) !== 24) {
        http_response_code(400);
        die(json_encode(array("Status","No Valid Id")));
    }

    $check = false;
    foreach ($collection->find() as $item) {
        if (new MongoDB\BSON\ObjectId($_GET['id']) == $item['_id']) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'title' => $item['title'],
                'week_nr' => $item['week_nr'],
            );
            $check = true;
            break;
        }
    }

    if (!$check) {
        http_response_code(404);
        die(json_encode(array("Status","No challenges found for this Id")));
    }
} elseif (isset($_GET['week_nr'])) {
    $check = false;
    foreach ($collection->find() as $item) {
        if ($_GET['week_nr'] == $item['week_nr']) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'title' => $item['title'],
                'week_nr' => $item['week_nr'],
            );
            $check = true;
            break;
        }
    }

    if (!$check) {
        http_response_code(404);
        die(json_encode(array("Status","No challenges found for this week number")));
    }
} else {
    foreach ($collection->find() as $item) {
        $return[$i] = array(
            '_id' => utf8_encode($item['_id']),
            'title' => $item['title'],
            'week_nr' => $item['week_nr'],
        );
        $i++;
    }
}

echo json_encode($return, JSON_FORCE_OBJECT);
?>