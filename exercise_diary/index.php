<?php
/** 
 * Created by PhpStorm. 
 * User: martijnbeljaards 
 * Date: 11-10-16 
 * Time: 13:12 
 */

require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);

$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='users';
$collection=$client->$dbname->$collname;
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
        $return[$i] = array(
            '_id' => utf8_encode($item['_id']),
            'exercises' => $item['exercises'],
            'number_week' => $item['number_week'],
            'name_day' => $item['name_day'],
            'users_id' => utf8_decode($item['users_id'])
        );
        $i++;
    }
    echo json_encode($return, JSON_FORCE_OBJECT);

}
//POST request:
elseif ($verb == 'POST')
{
    $data = json_decode(file_get_contents('php://input'), true);

    $week = date("W");
    $day = date("l");

    $exercises = $data["exercises"];
    $number_week = $week;
    $name_day = $day;
    $users_id = $data["users_id"];

    $query = array('exercises' => $exercises, 'number_week' => $number_week, 'name_day' => $name_day);

    $cursor = $collection->updateOne(
        array( '_id' => new MongoDB\BSON\ObjectId($users_id) ),
        array( '$push' => array( 'exercise_diaries' => $query ) )
    );

    echo json_encode(array("success"=>1), JSON_FORCE_OBJECT);
}
else
{
    echo json_encode(array("success"=>0), JSON_FORCE_OBJECT);
}