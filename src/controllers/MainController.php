<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\Router;

class MainController extends AbstractController
{
    function attachRoutes(Router $router)
    {
        $router->setRoute('/', 'home');
        $router->setRoute('/form', 'form');
    }
    function home()
    { 
        return "index.php";
    }
    function form()
    {
        return "form.php";
    }
}