<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 21-10-2016
 * Time: 12:23
 */
require 'db.php';
header('Content-Type:application/json;charset=utf-8');

echo $_POST['name'];
$name = strval($_POST['name']);
$age = strval($_POST['age']);
$gender = strval($_POST['gender']);
$weight = strval($_POST['weight']);
$length = strval($_POST['length']);

$response = $apiclient->request('POST', 'http://crassus-php.azurewebsites.net/post/', [
    'json' => [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
        'weight' => $weight,
        'length' => $length
    ]
]);
$code = $response->getStatusCode();
echo json_encode(array('Status'=>$code));

?>