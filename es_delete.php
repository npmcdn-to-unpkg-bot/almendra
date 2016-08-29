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

//if (!isset($_GET['id'])) {
  //  die ("No ID provided.");
//}

//$id = htmlentities($_GET['id']);
$id = 1;

$params = [
    'index' => $index,
    'type' => $type,
    'id' => $id

];

try {
    $response = $client -> delete($params);
    print_r($response);
} catch (\Elasticsearch\Common\Exceptions\Missing404Exception $e) {
    $msg = $e -> getMessage();
    print_r($msg);
}



//print_r(json_encode($response, JSON_PRETTY_PRINT));



