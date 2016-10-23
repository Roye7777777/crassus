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
$collname='exercise_diaries';
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

    $exercises = $data["exercises"];
    $users_id = $data["users_id"];

    if( empty($exercises) || empty($users_id))
    {
        echo "ERROR: EMPTY FIELD DETECTED!";
    }
    else
    {
        $query = array('exercises' => $exercises, 'users_id' => $users_id );
        $cursor = $collection->insertOne($query);
    }
}
else
{
    echo "Geen request...";
}