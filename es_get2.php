<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 7/18/16
 * Time: 6:30 AM
 */

require 'vendor/autoload.php';

$client = Elasticsearch\ClientBuilder::create()->build();


$not_found_msg = 'No match found.';

// data
$index = 'almendra';
$type = 'users';

if (!isset($_GET['id'])) {
    die ("Not id provided.");
}

$id = htmlentities($_GET['id']);
// do some proper data sanitation

//echo 'Using id: ' . $id;

// getting the response directly
$params = [
    'index' => $index,
    'type' => $type,
    'id' => $id,

    //'client' => [
    //	'ignore' = 404
    //	],
];



$response = $client -> get($params);
var_dump($response);


