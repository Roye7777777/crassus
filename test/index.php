<?php
require '../db.php';
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

$promise = $apiclient->requestAsync('GET', '/users/');
$promise->then(
    function (ResponseInterface $res) {
        echo $res->getStatusCode() . "\n aa";
    },
    function (RequestException $e) {
        echo $e->getMessage() . "\n aa";
        echo $e->getRequest()->getMethod();
    }
);

?>