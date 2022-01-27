<?php

/**
 * This might be not a best way to handle checkbox status
 * as it creates new PDO object and new connection,
 * but couldn't find better way for now.
 */

require __DIR__ . '/../src/Models/Database/Database.php';
require __DIR__ . '/../src/Models/Database/PDOClient.php';
require __DIR__ . '/../config/config.php';
use App\Models\Database\PDOClient;

//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);
$conn = new PDOClient(DB_DRIVER,DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
$conn->connect();
$conn->setTaskDone($decoded['id'], $decoded['checkboxStatus']);