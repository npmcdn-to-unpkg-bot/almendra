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

// get user by id
$params = [
    'index' => $index,
    'type' => $type,
    'id' => $id

];


//print_r(json_encode($params, JSON_PRETTY_PRINT));

// get results
//var_dump(get($params));
$response = $client -> get($params);
if (empty($response) || $response == '') {
    print_r(json_encode($not_found_msg, JSON_PRETTY_PRINT));
} else {
    print_r (json_encode($response, JSON_PRETTY_PRINT));
}




