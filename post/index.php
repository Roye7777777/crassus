<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);
$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='users';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
$query = array();

if( $_POST["name"] || $_POST["age"] ) {
    if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
        die ("invalid name and name should be alpha");
    }
//    echo "Welcome ". $_POST['name']. "<br />";
//    echo "You are ". $_POST['age']. " years old.";

    $query = array( 'name' => $_POST['name'], 'age' => $_POST['age'] );

    $cursor = $collection->insertOne( $query );

    //exit();
}
?>


<html>
<body>

<form action = "<?php $_PHP_SELF ?>" method = "POST">
    Name: <input type = "text" name = "name" />
    Age: <input type = "text" name = "age" />
    <input type = "submit" />
</form>

</body>
</html>