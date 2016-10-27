<?php
require '../db.php';
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

// dit moet je even nakijken, of het op deze manier gaat, dat je een json eraan meegeeft

$name = 'Harry';
$response = $apiclient->request('GET', 'http://crassus-php.azurewebsites.net/users/', [
    'json' => [
        'name' => $name
    ]
]);

// één van de twee dus...

$code = $response->getStatusCode();
$body = $response->getBody();
$what = $response->getHeader('content-type');

echo 'De Test';
echo json_encode(array(
    'Code'=>$code,
    'body'=>$body,
    'what'=>$what
));

$promise = $apiclient->requestAsync('GET', 'http://httpbin.org/get');
$promise->then(
    function (ResponseInterface $res) {
        echo $res->getStatusCode() . "\n";
    },
    function (RequestException $e) {
        echo $e->getMessage() . "\n";
        echo $e->getRequest()->getMethod();
    }
);

?>