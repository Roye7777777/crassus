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

echo (isset($_PUT['name'])) ? 'jezus': 'mozes';

echo "<br/>";

$nameb = isset($_PUT['name'])? str_replace(' ', '_', $_PUT['name']) : "";

echo '2 ', $nameb;

?>