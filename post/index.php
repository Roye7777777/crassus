<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 13-10-2016
 * Time: 10:31
 */
require '../vendor/autoload.php';

//if (is_null($_POST['name']) || is_null($_POST['age'])) {
//    echo 'Not all variables specified';
//    return 'FAILED';
//} else {
    /*$client = new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
    $dbname = 'crassus';
    $collname = 'users';
    $collection = $client->$dbname->$collname;
    //header('Content-Type:application/json;charset=utf-8');
    $query = array('name' => $_POST['name'], 'age' => $_POST['age']);

    $insertOne = $collection->insertOne($query);

    printf("Inserted %d document(s)\n", $insertOne->getInsertedCount());
    var_dump($insertOne->getInsertedId());*/

    $var = $_GET["name"];
    $ver = $_GET["age"];
    echo "<h1>Hallo " . $_GET["name"] . "</h1>";
    echo "<h1>Hello " . $_GET["age"] . "</h1>";

//}