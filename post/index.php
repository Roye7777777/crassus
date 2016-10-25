<?php
require '../vendor/autoload.php';
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='users';
$collection=$client->$dbname->$collname;

$data = json_decode(file_get_contents('php://input'), true);

$name = $data["name"];
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
default_value($name, "");
default_value($age, "");
default_value($weight, "");
default_value($gender, "");
default_value($length, "");

if (preg_match("/[^A-Za-z'-]/",$name )) {
    die ("invalid name and name should be alpha");
}
//header('Content-Type:application/json;charset=utf-8');
$query = array( 'name' => $name, 'age' => $age, 'weight' => $weight, 'length' => $length, 'gender' => $gender );
$cursor = $collection->insertOne( $query );

echo "Welcome ". $name. "<br />";
echo "You are ". $age. " years old.<br/>";
echo $weight. "<br />";
echo $length. "<br />";
echo $gender. "<br />";
//echo "Inserted %d document(s)<br/>", $cursor->getInsertedCount();
//echo $cursor->getInsertedId();

exit();

//    echo json_encode(array("success"=>1), JSON_FORCE_OBJECT);


?>