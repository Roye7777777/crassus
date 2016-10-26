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

// Vraag naar type request:
$verb = $_SERVER['REQUEST_METHOD'];


//GET request:
if ($verb == 'GET') {
    header('Content-Type:application/json;charset=utf-8');
    $i = 0;
    $return = [];
    if (isset($_GET['id'])) {
        if (strlen($_GET['id']) !== 24) {
            http_response_code(400);
            die(json_encode(array("Status", "No Valid Id")));
        }

        $check = false;
        foreach ($collection->find() as $item) {
            if (new MongoDB\BSON\ObjectId($_GET['id']) == $item['_id']) {
                $return[$i] = array(
                    '_id' => utf8_encode($item['_id']),
                    'age' => $item['age'],
                    'name' => $item['name'],
                    'length' => $item['length'],
                    'gender' => $item['gender'],
                    'weight' => $item['weight'],
                    'food_diaries' => $item['food_diaries'],
                    'exercise_diaries ' => $item['exercise_diaries']
                );
                $check = true;
                break;
            }
        }
        if (!$check) {
            http_response_code(404);
            die(json_encode(array("Status", "No User found for this Id")));
        }
    } else {
        foreach ($collection->find() as $item) {
            $return[$i] = array(
                '_id' => utf8_encode($item['_id']),
                'age' => $item['age'],
                'name' => $item['name'],
                'length' => $item['length'],
                'gender' => $item['gender'],
                'weight' => $item['weight'],
                'food_diaries' => $item['food_diaries'],
                'exercise_diaries ' => $item['exercise_diaries']
            );
            $i++;
        }
        if (count($return) === 0) {
            http_response_code(404);
            die(json_encode(array("Status"=>"No Users found")));
        }
    }

    echo json_encode($return, JSON_FORCE_OBJECT);
}
//POST request:
elseif ($verb == 'POST') {
    header('Content-Type:application/json;charset=utf-8');
    $data = json_decode(file_get_contents('php://input'), true);

    if(empty($data)) {
        http_response_code(400);
        die(json_encode(array("Status"=>"No args given")));
    }

    $name = $data["name"];
    $age = $data["age"];
    $weight = $data["weight"];
    $length = $data["length"];
    $gender = $data["gender"];

    if (preg_match("/[^A-Za-z'-]/",$name )) {
        http_response_code(400);
        die(json_encode(array("Status"=>"Invalid argument 'name'")));
    }

    function default_value(&$var, $default)
    {
        if (empty($var))
        {
            $var = $default;
        }
    }
    default_value($name, "");
    default_value($age, "");
    default_value($weight, "");
    default_value($length, "");
    default_value($gender, "");

    $query = array( 'name' => $name, 'age' => $age, 'weight' => $weight, 'length' => $length, 'gender' => $gender );
    $cursor = $collection->insertOne( $query );
    die(json_encode(array("Status"=>"Post successful")));
}
//PUT request:
elseif ($verb == 'PUT') {
    header('Content-Type:application/x-www-form-urlencoded;charset=utf-8');
    $data = http_build_query(file_get_contents('php://input'), true);
    if (isset($_PUT['name'])) {
        echo '1. '. $_PUT['name'];
    } else {
        echo 'boohoo';
    }
   // echo '2. '. $data['name'];
}
// else
else {
    http_response_code(405);
    die(json_encode(array("Status"=>"Request not allowed")));
}
?>