<?php

namespace App\Controllers;

use App\App;
use App\Controllers\AbstractController;
use App\Models\Entity\Task;
use App\Models\Router;
use App\Helpers\Dump;
class MainController extends AbstractController
{
    function attachRoutes(Router $router)
    {
        $router->setRoute('/', 'home');
        $router->setRoute('/form', 'form');
        $router->setRoute('/login', 'login');
      //  $router->setRoute('/form/{id}', 'edit');
    }
    function home()
    { 
       $tasks = [];
        $query = App::$app->db->select("SELECT * FROM todo_mvc")->getAll();
        foreach ($query as $item) {
            $task = new Task();
            $task->populateData($item);
            $tasks[] = $task;
        };
        return ["view" => 'index.php',
            "data" => $tasks];
    }
    function form($id = null)
    {
        $params = ["number" => "123"];
        return ["view" => "form.php",
             "params" => $params];
    }
    function login()
    {
        return ["view" => "login.php"];
    }
}