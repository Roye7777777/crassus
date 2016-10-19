<?php
/**
 * Created by PhpStorm.
 * User: martijnbeljaards
 * Date: 11-10-16
 * Time: 13:12
 */

require '../vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client([
    'base_uri' => 'http://crassus-php.azurewebsites.net',
    'timeout'  => 10.0,
]);

$client=new MongoDB\Client('mongodb://crassus:0ur0b0r0s@ds046939.mlab.com:46939/crassus');
$dbname='crassus';
$collname='food_diaries';
$collection=$client->$dbname->$collname;
header('Content-Type:application/json;charset=utf-8');
// This $query will be the content that comes between
$query = array();

if (!is_null($_GET['id'])) {
    $var = $_GET['id'];
    $query = array('_id' => new MongoDB\BSON\ObjectId($var) );
}

$cursor = $collection->find( $query );

$i = 0;
$return = [];
foreach($cursor as $item){
    $return[$i] = array(
        '_id'=>utf8_encode($item['_id']),
        'breakfast'=>$item['breakfast'],
        'lunch'=>$item['lunch'],
        'dinner'=>$item['dinner'],
        'snacks'=>$item['snacks'],
        'post_date'=>$item['post_date'],
        'number_week'=>$item['number_week'],
        'users_id'=>$item['users_id']
    );
    $i++;
}
echo json_encode($return, JSON_FORCE_OBJECT);

/*    $verb = $_SERVER['REQUEST_METHOD'];

    if ($verb == 'GET')
    {
        // GET:
        // check if get-variables are set:
            //... where food_diaries.users_id == users._id (=ingelogde account)
            //... diary (collection) == food_diaries
        if (isset($_GET['food_diaries']))
        {
            $file_content = file_get_contents($_GET['food_diaries']);
            echo $file_content;
        }
        elseif (isset($_GET['exercise_diaries']))
        {
            $file_content = file_get_contents($_GET['exercise_diaries']);
            echo $file_content;
        }
        else
        {
            die("ERROR: no required parameters given!");
        }
    }
    elseif ($verb == 'POST')
    {
        // POST:
        // check if post-variables are set
        if (isset($_POST['breakfast']) or isset($_POST['lunch']) or isset($_POST['dinner']) or isset($_POST['snacks']))
        {
            file_put_contents($_POST['breakfast'], $_POST['lunch'], $_POST['dinner'], $_POST['snacks']);
        }
        elseif (isset($_POST['exercises']))
        {
            file_put_contents($_POST['exercises']);
        }
        else
        {
            die("ERROR: no required parameters given!");
        }
    }*/
?>