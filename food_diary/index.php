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

$breakfast = $lunch = $dinner = $snacks = $post_date = $number_week = array('$ne'=>'null');

$replace = array(
    " "=>"_",
    ","=>""
);

if (!empty($_GET)) {
    if (!is_null($_GET['breakfast']))
        $breakfast = str_replace_assoc($replace,$_GET['breakfast']);
    if (!is_null($_GET['lunch']))
        $lunch = str_replace_assoc($replace,$_GET['lunch']);
    if (!is_null($_GET['dinner']))
        $dinner = str_replace_assoc($replace,$_GET['dinner']);
    if (!is_null($_GET['snacks']))
        $snacks = str_replace_assoc($replace,$_GET['snacks']);
    if (!is_null($_GET['post_date']))
        $snacks = str_replace_assoc($replace,$_GET['post_date']);
    if (!is_null($_GET['number_week']))
        $snacks = str_replace_assoc($replace,$_GET['number_week']);

    $query = array('food_diaries' => array('$elemMatch'=> array('breakfast'=>$breakfast, 'lunch'=>$lunch, 'dinner'=>$dinner, 'snacks'=>$snacks, 'post_date'=>$post_date, 'number_week'=>$number_week)));
}

$cursor = $collection->find($query,array('food_diaries'));

// Vraag naar type request:
$verb = $_SERVER['REQUEST_METHOD'];

//GET request:
if ($verb == 'GET')
{
    $i = 0;
    $return = [];
    foreach ($cursor as $item) {
        if (!is_null($item['food_diaries'])) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'food_diaries' => $item['food_diaries']
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

    $breakfast = $data["breakfast"];
    $lunch = $data["lunch"];
    $dinner = $data["dinner"];
    $snacks = $data["snacks"];
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
    default_value($breakfast, "");
    default_value($lunch, "");
    default_value($dinner, "");
    default_value($snacks, "");

    $query = array('breakfast' => $breakfast, 'lunch' => $lunch, 'dinner' => $dinner, 'snacks' => $snacks,
            'post_date' => $post_date, 'number_week' => $number_week );

    $cursor = $collection->updateOne(
        array( '_id' => new MongoDB\BSON\ObjectId($users_id) ),
        array( '$push' => array( 'food_diaries' => $query ) )
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