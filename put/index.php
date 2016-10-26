<?php
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$age = $data["age"];
$length = $data["length"];
$weight = $data["weight"];
$gender = $data["gender"];

if( empty($data)) {
    echo "No args given";
} else {
    if (preg_match("/[^A-Za-z'-]/",$name )) {
        die ("invalid name and name should be alpha");
    }
    echo 'ok';
    //header('Content-Type:application/json;charset=utf-8');
    $cursor = $collection->updateOne(
        array( 'name' => $name ),
        array( '$set' => array( 'length' => $length, 'age' => $age, 'weight' => $weight, 'gender' => $gender ) )
    );

    echo "Welcome ". $name. "<br />";
    echo "You are now ". $age. " years old.<br/>";
    //echo "Inserted %d document(s)<br/>", $cursor->getInsertedCount();
    //echo $cursor->getInsertedId();

    exit();
}
?>