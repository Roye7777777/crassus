<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 25-10-2016
 * Time: 12:46
 */
$data = json_decode(file_get_contents('php://input'), true);
$name = isset($data['name'])? str_replace(' ', '_', $data['name']) : "";
echo '1 ', $name;

echo "<br/>";

$nameb = isset($_POST['name'])? str_replace(' ', '_', $_POST['name']) : "";

echo '2 ', $nameb;

