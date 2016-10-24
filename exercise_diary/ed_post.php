<?php
/**
 * Created by PhpStorm.
 * User: martijnbeljaards
 * Date: 11-10-16
 * Time: 13:12
 */

// fd_post == food_diary_post
require '../vendor/autoload.php';
// This is the only 'use' we use, to make the HTTP-requests possible
use GuzzleHttp\Client;

$client = new Client(['base-uri' => 'http://crassus-php.azurewebsites.net']);
$response = $client->request('POST', 'http://crassus-php.azurewebsites.net/exercise_diary/', [
    'json' => ['exercises' => $_POST['exercises'], 'number_week' => $_POST['number_week'],
            'name_day' => $_POST['name_day'], 'users_id' => $_POST['users_id']]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "<br />";
    echo "Correct";
}
?>