<?php
require '../db.php';
/**
 *
 * Zie /users/ voor de werkelijke voor Postman bestemde request
 *
 */
$collname='users';
$collection=$dbclient->$dbname->$collname;

$data = json_decode(file_get_contents('php://input'), true);

$username = $data["username"];
$password = $data["password"];
$first_name = $data["first_name"];
$last_name = $data["last_name"];
$age = $data["age"];
$weight = $data["weight"];
$gender = $data["gender"];
$length = $data["length"];

function default_value(&$var, $default)
{
    if (empty($var))
    {
        $var = $default;
    }
}

default_value($username, "");
default_value($password, "");
default_value($last_name, "");
default_value($first_name, "");
default_value($age, "");
default_value($weight, "");
default_value($gender, "");
default_value($length, "");

if (preg_match("/[^A-Za-z'-]/",$first_name, $last_name )) {
    die ("invalid name and name should be alpha");
}
//header('Content-Type:application/json;charset=utf-8');
$query = array( 'password' => $password, 'username' => $username, 'last_name' => $last_name, 'first_name' => $first_name, 'age' => $age, 'weight' => $weight, 'length' => $length, 'gender' => $gender );
$cursor = $collection->insertOne( $query );

echo json_encode(array('Status'=>'success', 'Name'=>$first_name . ' ' . $last_name));

exit();

/*
function default_value(&$var, $default)
{
    if (empty($var))
        $var = $default;
}
$data = json_decode(file_get_contents('php://input'), true);

if (preg_match("/[^A-Za-z'-]/",$data['first_name'], $data['last_name'] ))
    die ("invalid name and name should be alpha");

$query = array();
$i = 0;

foreach($data as $arg) {
    default_value($arg, "");
    $query['$'.$data[$i]] = $arg;
    $i++;
}

var_dump($query);

$cursor = $collection->insertOne( $query );

echo json_encode(array('Status'=>'success','id'=>$cursor->getInsertedId()));
 */
?>