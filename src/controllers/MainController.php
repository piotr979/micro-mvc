<?php

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\Router;

class MainController extends AbstractController
{
    function attachRoutes(Router $router)
    {
        // $router->setRoute('/home', function() {
        //     return $this->home();
        // });

        $router->setRoute('/', 'home');
    }


    function home()
    {
        return "Hello World";
    }
}