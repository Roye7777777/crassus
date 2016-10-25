<?php

require 'db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');

if (!isset($_GET['id']) || is_null($_GET['id']))
    die ("No ID given");

$cursor = $collection->find();
$check = false;
foreach($cursor as $item) {
    echo($item['_id']);
    echo(new MongoDB\BSON\ObjectId($_GET['id']));
    if (new MongoDB\BSON\ObjectId($_GET['id']) == $item['_id']) {
        $check = true;
        break;
    }
}
if (!$check)
    die ("No results");

$i = 0;
echo json_encode(array('test'=>'df'));
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id'])
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);

/*$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$age = $data["age"];

if( empty($name) || empty($age) ) {
    die(json_encode(array("status"=>"no args found")));
}
if (preg_match("/[^A-Za-z'-]/",$name )) {
    die (json_encode(array("status"=>"invalid name and name should be alpha")));
}
$cursor = $collection->updateOne(
    array( 'name' => $name ),
    array( '$set' => array( 'name' => $name, 'age' => $age ) )
);
echo json_encode(array("name"=>$name,"age"=>$age));
exit();*/
?>