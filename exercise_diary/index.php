<?php
/** 
 * Created by PhpStorm. 
 * User: martijnbeljaards 
 * Date: 11-10-16 
 * Time: 13:12 
 */

require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');

$query = array();
$foodList = array();

$exercises = $number_week = $name_day = array('$ne'=>'null');

$replace = array(
    " "=>"_",
    ","=>""
);

if (!empty($_GET)) {
    if (!is_null($_GET['exercises']))
        $exercises = str_replace_assoc($replace,$_GET['exercises']);
    if (!is_null($_GET['number_week']))
        $number_week = str_replace_assoc($replace,$_GET['number_week']);
    if (!is_null($_GET['name_day']))
        $name_day = str_replace_assoc($replace,$_GET['name_day']);

    $query = array('food_diaries' => array('$elemMatch'=> array('exercises'=>$exercises, 'number_week'=>$number_week, 'name_day'=>$name_day)));
}

$cursor = $collection->find($query, array('exercise_diaries'));

// Vraag naar type request:
$verb = $_SERVER['REQUEST_METHOD'];

//GET request:
if ($verb == 'GET')
{
    $i = 0;
    $return = [];
    foreach ($cursor as $item) {
        if (!is_null($item['exercise_diaries'])) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'exercise_diaries' => $item['exercise_diaries']
            );
            $i++;
        }
    }
    if (count($return) === 0) {
        http_response_code(404);
        die(json_encode(array("Status","No User(s) found")));
    }
    echo json_encode($return, JSON_FORCE_OBJECT);
}
//POST request:
elseif ($verb == 'POST')
{
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data)) {
        http_response_code(400);
        die(json_encode(array("Status","No arguments given")));
    }
    date_default_timezone_set('Europe/Amsterdam');
    $today = date("Y-m-d H:i:s");
    $week = date("W");

    $exercises = $data["exercises"];
    $name_day = $data["name_day"];
    $post_date = $today;
    $number_week = $week;
    $users_id = $data["users_id"];

    if (strlen($users_id) !== 24) {
        http_response_code(400);
        die(json_encode(array("Status","No (Valid) Id")));
    }

    $check = false;
    foreach ($collection->find() as $item) {
        if (new MongoDB\BSON\ObjectId($users_id) == $item['_id']) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id'])
            );
            $check = true;
            break;
        }
    }
    if (!$check) {
        http_response_code(404);
        die(json_encode(array("Status","No User found with this ID")));
    }

    function default_value(&$var, $default)
    {
        if (empty($var))
        {
            $var = $default;
        }
    }
    default_value($exercises, "");
    default_value($number_week, "");
    default_value($name_day, "");

    $query = array('exercises' => $exercises, 'number_week' => $number_week, 'name_day' => $name_day );

    $cursor = $collection->updateOne(
        array( '_id' => new MongoDB\BSON\ObjectId($users_id) ),
        array( '$push' => array( 'exercise_diaries' => $query ) )
    );

    echo json_encode(array("success"=>1), JSON_FORCE_OBJECT);
}
else
{
    http_response_code(405);
    die(json_encode(array("Status","No valid request")));
}

function str_replace_assoc(array $replace, $subject) {
    return str_replace(array_keys($replace),array_values($replace), $subject);
}