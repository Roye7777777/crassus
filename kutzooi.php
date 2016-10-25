<?php

require 'db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$get = $_GET['id'];

if (!isset($get))
    die ("No ID given");

echo json_encode(array("c"=>isset($get)));
echo json_encode(array("d"=>is_null($get)));

$cursor = $collection->find( array('_id' => new MongoDB\BSON\ObjectId($get) ) );
$c = 0;
echo json_encode(array("a"=>"f"));
foreach ($cursor as $item) {
    $c++;
}
echo json_encode(array("results"=>$c));
if ($c === 0)
    die ("No results");

$i = 0;
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