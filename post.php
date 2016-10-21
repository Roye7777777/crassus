<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 21-10-2016
 * Time: 12:23
 */
$response = $client->request('POST', 'http://crassus-php.azurewebsites.net/post', [
    'form_params' => [
        'name' => 'Chaso',
        'age' => '123'
    ]
]);
foreach ($response->getHeaders() as $name => $values) {
    echo $name . ': ' . implode(', ', $values) . "\r\n";
}
?>