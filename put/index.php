<?php
require '../vendor/autoload.php';
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='users';
$collection=$client->$dbname->$collname;

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
$age = $data["age"];

if( empty($name) || empty($age) ) {
    echo 'No arguments given';
} else {
    if (preg_match("/[^A-Za-z'-]/",$name )) {
        die ("invalid name and name should be alpha");
    }
    //header('Content-Type:application/json;charset=utf-8');
    $query = array( 'name' => $name, 'age' => $age );
    $cursor = $collection->updateOne( array('name'=>$name), $query );

    echo "Welcome ". $name. "<br />";
    echo "You are now ". $age. " years old.<br/>";
    //echo "Inserted %d document(s)<br/>", $cursor->getInsertedCount();
    //echo $cursor->getInsertedId();

    exit();
}
?>