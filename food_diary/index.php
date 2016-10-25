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

    // This $query will be the content that comes between
    $query = array();

    if (!is_null($_GET['id'])) {
        $var = $_GET['id'];
        $query = array('_id' => new MongoDB\BSON\ObjectId($var));
    }

    $cursor = $collection->find($query);

    // Vraag naar type request:
    $verb = $_SERVER['REQUEST_METHOD'];

//GET request:
if ($verb == 'GET')
{
    $i = 0;
    $return = [];
    foreach ($cursor as $item) {
        $return[$i] = array( 'food_diaries', array(
            '_id' => utf8_encode($item['_id']),
            'breakfast' => $item['breakfast'],
            'lunch' => $item['lunch'],
            'dinner' => $item['dinner'],
            'snacks' => $item['snacks'],
            'post_date' => $item['post_date'],
            'number_week' => $item['number_week'],
            'users_id' => utf8_decode($item['users_id'])
        ) );
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