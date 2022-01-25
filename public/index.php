<?php

use App\App;

require_once __DIR__ . "/../config/config.php";
require_once $path . '/../vendor/autoload.php';

$app = new App();
$app->run();
$action = $_SERVER['REQUEST_URI'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $app->router->dispatch($action);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $app->router->dispatch($action);
}


 