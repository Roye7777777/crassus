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

$breakfast = $lunch = $dinner = $snacks = array('$ne'=>'null');

if (!empty($_GET)) {
    if (!is_null($_GET['breakfast']))
        $breakfast = str_replace(array('_', ','), array(' ', ''),$_GET['breakfast']);
    if (!is_null($_GET['lunch']))
        $lunch = str_replace(array('_', ','), array(' ', ''),$_GET['lunch']);
    if (!is_null($_GET['dinner']))
        $dinner = str_replace(array('_', ','), array(' ', ''),$_GET['dinner']);
    if (!is_null($_GET['snacks']))
        $snacks = str_replace(array('_', ','), array(' ', ''),$_GET['snacks']);
    $query = array('food_diaries' => array('$elemMatch'=> array('breakfast'=>$breakfast, 'lunch'=>$lunch, 'dinner'=>$dinner, 'snacks'=>$snacks)));
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
        $j = 0;
        $return_food = [];
        for ($k = 0; $k < count($item['food_diaries']); $k++) {
            $return_food[$j] = array(
                'breakfast' => $item['food_diaries'][$k]['breakfast'],
                'lunch' => $item['food_diaries'][$k]['lunch'],
                'dinner' => $item['food_diaries'][$k]['dinner'],
                'snacks' => $item['food_diaries'][$k]['snacks'],
                'post_date' => $item['food_diaries'][$k]['']
            );
            $j++;
        }
        $return[$i] = array(
            '_id' => utf8_encode($item['_id']),
            'food_diaries' => $return_food,
            'post_date' => $item['post_date'],
            'number_week' => $item['number_week'],
        );
        $i++;
    }
    echo json_encode($return, JSON_FORCE_OBJECT);
}
//POST request:
elseif ($verb == 'POST')
{
    $data = json_decode(file_get_contents('php://input'), true);

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
    echo json_encode(array("success"=>0), JSON_FORCE_OBJECT);
}