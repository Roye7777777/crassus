<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 11-10-2016
 * Time: 10:52
 */
require 'db.php';

$response = $apiclient->get('http://crassus-php.azurewebsites.net/questions');
$code = $response->getStatusCode(); // Can be 200
$reason = $response->getReasonPhrase(); // Can be OK
echo $code;
echo $reason;
echo $response->getBody();
echo $response->getHeaders();
?>