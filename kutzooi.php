<?php

require 'db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
// This $query will be the content that comes between
if (!isset($_GET['id']))
    die ("No ID given");

$cursor = $collection->find( [ '_id' => new MongoDB\BSON\ObjectId($_GET['id']) ] );
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