<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 21-10-2016
 * Time: 12:23
 */
$response = $client->request('POST', 'http://crassus-php.azurewebsites.net/post', [
    'json' => ['name' => 'jannus', 'age' => 99]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "It exists";
}
?>