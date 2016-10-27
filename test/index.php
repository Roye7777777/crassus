<?php
require '../db.php';
//use Psr\Http\Message\ResponseInterface;
//use GuzzleHttp\Exception\RequestException;

// dit moet je even nakijken, of het op deze manier gaat, dat je een json eraan meegeeft

$response = $apiclient->get('/users/');
$response2 = $apiclient->post('/users/');

$code = $response->getStatusCode();
$body = $response->getBody();
$leng = $response->getHeader('Content-Length');
$type = $response->getHeader('Content-Type');

echo json_encode(array(
    'Code'=>$code,
    'body'=>$body,
    'len'=>$leng,
    'type'=>$type
));

$code2 = $response2->getStatusCode();
$body2 = $response2->getBody();
$leng2 = $response2->getHeader('Content-Length');
$type2 = $response2->getHeader('Content-Type');

echo json_encode(array(
    'Code'=>$code2,
    'body'=>$body2,
    'len'=>$leng2,
    'type'=>$type2
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