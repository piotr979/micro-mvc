<?php
$path = realpath(__DIR__);
require_once $path . '/../vendor/autoload.php';
use App\App;

$app = new App();

// new  route


$app->router->get('/contact', 'contact');
$app->run();
