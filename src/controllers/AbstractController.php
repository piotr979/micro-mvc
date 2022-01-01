<?php

namespace App\Controllers;

use App\Models\Router;

abstract class AbstractController
{
    abstract function attachRoutes(Router $router);
}