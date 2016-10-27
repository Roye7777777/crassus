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

foreach($data as $arg) {
    $key = array_keys($arg);
    default_value(${array_keys($arg)}, "");
    $query['$'.$key] = $arg;
}

$cursor = $collection->insertOne( $query );

echo json_encode(array('Status'=>'success','id'=>$cursor->getInsertedId()));

?>