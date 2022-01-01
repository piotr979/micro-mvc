<?php

use App\App;
use App\Helpers\Dump;

DEFINE('ROOT_DIR', realpath(__DIR__ . '/../'));
DEFINE('SRC_DIR', realpath(__DIR__ . '/../src/'));


$path = realpath(__DIR__);
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


