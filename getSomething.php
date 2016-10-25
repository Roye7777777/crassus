<?php
/**
 * Created by PhpStorm.
 * User: Roy
 * Date: 11-10-2016
 * Time: 10:49
 */
require 'db.php';

$collname = 'questions';
$collection = $dbclient->$dbname->$collname;

// Set up cursor (i.e. kind of like a query): find every document where question_nr is 1
$result = $collection->find( [ 'question_nr' => 1 ] );

// Show all found results (documents), by showing document ID and question_nr
//return $result;
?>