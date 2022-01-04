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
      //  $router->setRoute('/form/{id}', 'edit');
    }
    function home()
    { 
        return "index.php";
    }
    function form($id = null)
    {
        echo $id;
        $params = ["number" => "123"];
        return ["view" => "form.php",
             "params" => $params];
    }
    function edit(int $id)
    {
        echo "From edit";
        echo $id;
    }
}