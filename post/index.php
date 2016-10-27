<?php
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;

function default_value(&$var, $default)
{
    if (empty($var))
        $var = $default;
}
$data = json_decode(file_get_contents('php://input'), true);

if (preg_match("/[^A-Za-z'-]/",$data['first_name'], $data['last_name'] ))
    die ("invalid name and name should be alpha");

$query = array();

var_dump($data);

foreach($data as $arg) {
    $key = array_keys($arg);
    var_dump('A'.$key.'&'.$arg);
    default_value($arg, "");
    $query['$'.$key] = $arg;
}

var_dump($query);

$cursor = $collection->insertOne( $query );

echo json_encode(array('Status'=>'success','id'=>$cursor->getInsertedId()));

?>