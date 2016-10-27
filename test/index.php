<?php
require '../db.php';
//use Psr\Http\Message\ResponseInterface;
//use GuzzleHttp\Exception\RequestException;

// dit moet je even nakijken, of het op deze manier gaat, dat je een json eraan meegeeft

//$response = $apiclient->request('GET', '/users/');
$response = $apiclient->get('/users/');

$code = $response->getStatusCode();
$body = $response->getBody();

echo json_encode(array(
    'Code'=>$code,
    'body'=>$body
));
/*
$promise = $apiclient->requestAsync('GET', 'http://httpbin.org/get');
$promise->then(
    function (ResponseInterface $res) {
        echo $res->getStatusCode() . "\n";
    },
    function (RequestException $e) {
        echo $e->getMessage() . "\n";
        echo $e->getRequest()->getMethod();
    }
);*/

?>