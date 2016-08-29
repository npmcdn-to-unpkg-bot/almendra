<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 7/18/16
 * Time: 6:30 AM
 */

require 'vendor/autoload.php';

$client = Elasticsearch\ClientBuilder::create()->build();

// data
$index = 'almendra';
$type = 'users';

if (!isset($_GET['email'])) {
    die ("Not email provided.");
}

$email = htmlentities($_GET['email']);
// do some proper data sanitation

//echo 'Using email: ' . $email;

// get user by id
$params = [
    'index' => $index,
    'type' => $type,
    'body' => [
        'query' => [
            'match' => [
                'email' => $email
            ],
        ],
    ],

];

// search by email
$response = $client -> search($params);


// users
header('Content-Type:application/json');
header('Access-Control-Allow-Origin: *');

//echo '<pre>';
print_r(json_encode($response, JSON_PRETTY_PRINT));

//echo '</pre>';











