<?php
/** 
 * Created by PhpStorm. 
 * User: martijnbeljaards 
 * Date: 11-10-16 
 * Time: 13:12 
 */

// Connect with database
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');

$query = array();
$foodList = array();

// No empty array's
$breakfast = $lunch = $dinner = $snacks = $post_date = $number_week = array('$ne'=>'null');

// Replace all spaces with _ and all , with no-space
$replace = array(
    " "=>"_",
    ","=>""
);

// if the $_GET request is not empty or the fields are not null,
// then get the given data of breakfast/etc. and put it in breakfast/etc.
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

    // put all given fields in an array, and place this array into $query for later use
    $query = array('food_diaries' => array('$elemMatch'=> array('breakfast'=>$breakfast, 'lunch'=>$lunch, 'dinner'=>$dinner, 'snacks'=>$snacks, 'post_date'=>$post_date, 'number_week'=>$number_week)));
}

// Make a $cursor that searches all collections with the values that are given in $query
$cursor = $collection->find($query,array('food_diaries'));

// ask for type of request:
$verb = $_SERVER['REQUEST_METHOD'];

//GET request:
if ($verb == 'GET')
{
    // loop through $cursor (with the call for all collections) and add the values into a variable
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
    // if $return got no 0 values (so the database is empty) then return 404 + ERROR (message) and quit
    if (count($return) === 0) {
        http_response_code(404);
        die(json_encode(array("Status","No User(s) found")));
    }
    // return the created $return with all variables and return it as json
    echo json_encode($return, JSON_FORCE_OBJECT);
}
//POST request:
elseif ($verb == 'POST')
{
    // decode the given json variables in Postman (or the textboxes in the app)
    // so each variable can get a value from the database
    $data = json_decode(file_get_contents('php://input'), true);
    if (empty($data)) {
        http_response_code(400);
        die(json_encode(array("Status","No arguments given")));
    }
    date_default_timezone_set('Europe/Amsterdam');
    $today = date("Y-m-d H:i:s");
    $week = date("W");

    // put each piece of decoded json-code in $data in a variable
    $breakfast = $data["breakfast"];
    $lunch = $data["lunch"];
    $dinner = $data["dinner"];
    $snacks = $data["snacks"];
    $post_date = $today;
    $number_week = $week;
    $users_id = $data["users_id"];

    // the id string in mongodb (objectid) always has 24 keys (numbers/letters)
    // if the given users_id doesnt have 24 keys give back a 400:ERROR
    if (strlen($users_id) !== 24) {
        http_response_code(400);
        die(json_encode(array("Status","No (Valid) Id")));
    }

    // go through every document in every collection
    // search for every given $item an id in the database that matches the given users_id
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

    //give all the fields that arent mentioned a default value
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

    // put all edited variables into an array: $query
    $query = array('breakfast' => $breakfast, 'lunch' => $lunch, 'dinner' => $dinner, 'snacks' => $snacks,
            'post_date' => $post_date, 'number_week' => $number_week );

    // push the arrays to the array where the id matches the users_id
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