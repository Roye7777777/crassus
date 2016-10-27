<?php
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$age = $data["age"];
$length = $data["length"];
$weight = $data["weight"];
$gender = $data["gender"];

if( empty($data) ) {
    http_response_code(400);
    die(json_encode(array("Status","No args given")));
}
if ( preg_match("/[^A-Za-z'-]/",$name ) ) {
    http_response_code(400);
    die (json_encode(array("Status","Invalid Name")));
}
$cursor = $collection->updateOne(
    array( 'name' => $name ),
    array( '$set' => array( 'length' => $length, 'age' => $age, 'weight' => $weight, 'gender' => $gender ) )
);

die (json_encode(array("Status","Success: name: ".$name.", age: ".$age)));
?>