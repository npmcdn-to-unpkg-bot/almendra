<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 7/18/16
 * Time: 6:30 AM
 */

require 'vendor/autoload.php';

$client = Elasticsearch\ClientBuilder::create()->build();


// build a MySQL 'almendra.users' table equivalent

// user data
$users = [
    [
        'id' => 1,
        'name' => 'Robert',
        'email' => 'robert@e-quilibrium.com',
        'password' => 'secret',

    ],
    [
        'id' => 2,
        'name' => 'Dimitri',
        'email' => 'dimo@e-quilibrium.com',
        'password' => 'secret',

    ],
    [
        'id' => 3,
        'name' => 'Richard',
        'email' => 'richard@e-quilibrium.com',
        'password' => 'secret',

    ],


];

// some default values
$created_at = '';
$updated_at = '';

$index = 'almendra';
$type = 'users';
$id = 1; // default, to be resolve to a auto-incremental id


// let's start by creating a few users


foreach ($users as $user) {

    $body = [
        'name' => $user['name'],
        'email' => $user['email'],
        'password' => $user['password'],
        'created_at' => $created_at,
        'updated_at' => $updated_at,

    ];

    $params = [
        'index' => $index,
        'type' => $type,
        'id' => $user['id'],
        'body' =>  $body ,
    ];

    // index it
    $response = $client -> index($params);
    print_r(json_encode($response, JSON_PRETTY_PRINT));
    //print_r($params);
}



// get all users in JSON
function get($params) {
    $response = $client -> get($params);
    return print_r(json_encode($response, JSON_PRETTY_PRINT));

}