<?php
require '../db.php';
$collname='users';
$collection=$dbclient->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');

function default_value(&$var, $default)
{
    if (empty($var))
        $var = $default;
}
$data = json_decode(file_get_contents('php://input'), true);

echo $data['first_name'];
echo $data;


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

?>