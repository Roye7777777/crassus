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
$exerciseList = array();

$exercises = $number_week = $name_day = array('$ne'=>'null');

if (!empty($_GET)) {
    if (!is_null($_GET['exercises']))
        array_push($exerciseList, array('exercises' => $_GET['exercises']));
    if (!is_null($_GET['number_week']))
        array_push($exerciseList, array('number_week' => $_GET['number_week']));
    if (!is_null($_GET['name_day']))
        array_push($exerciseList, array('name_day' => $_GET['name_day']));
    $query = array('exercise_diaries' => array('$elemMatch' => $exerciseList));
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
        $j = 0;
        $return_exercises = [];
        //Geef alle velden op die in de collection exercise_diaries dienen te komen hier op (loop door alle users):
        for ($k = 0; $k < count($item['exercise_diaries']); $k++) {
            $return_exercises[$j] = array(
                'exercises' => $item['exercise_diaries'][$k]['exercises'],
                'number_week' => $item['exercise_diaries'][$k]['number_week'],
                'name_day' => $item['exercise_diaries'][$k]['name_day']
            );
            $j++;
        }
        //En geef alle velden die voor GET-request opgevraagd worden hier op
        //Dus een _id, en de gevulde collection 'exercises_diaries'
        $return[$i] = array(
            '_id' => utf8_encode($item['_id']),
            'exercise_diaries' => $return_exercises,
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