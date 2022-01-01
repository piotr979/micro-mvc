<?php

use App\App;


$path = realpath(__DIR__);
require_once $path . '/../vendor/autoload.php';

$app = new App();


$app->run();


$action = $_SERVER['REQUEST_URI'];
$app->router->dispatch($action);


// require_once "route.php";

// route('/', function () {
//     return "Hello World";
// });

// route('/about', function () {
//     return "Hello form the about route";
// });

// $action = $_SERVER['REQUEST_URI'];
// dispatch($action);

