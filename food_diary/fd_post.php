<?php
/**
 * Created by PhpStorm.
 * User: martijnbeljaards
 * Date: 11-10-16
 * Time: 13:12
 */
/**
 *
 * Zie index.php voor de voor Postman bestemde request
 *
 */
// fd_post == food_diary_post
require '../db.php';

$response = $apiclient->request('POST', 'http://crassus-php.azurewebsites.net/food_diary/', [
    'json' => ['breakfast' => $_POST['breakfast'], 'lunch' => $_POST['lunch'],
        'dinner' => $_POST['dinner'], 'snacks' => $_POST['snacks'],
        'post_date' => $_POST['post_date'], 'number_week' => $_POST['number_week'],
        'users_id' => $_POST['users_id']]
]);
$code = $response->getStatusCode();
echo $code;
if ($response->hasHeader('Content-Length')) {
    echo "<br />";
    echo "Correct";
}
?>