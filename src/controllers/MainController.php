<?php

namespace App\Controllers;

use App\App;
use App\Controllers\AbstractController;
use App\Models\Entity\Task;
use App\Models\Router;
use App\Helpers\Dump;
use App\Models\Authorisation;
use App\Helpers\Url;

class MainController extends AbstractController
{
    function attachRoutes(Router $router)
    {
        $router->setRoute('/', 'home');
        $router->setRoute('/form', 'form');
        $router->setRoute('/login', 'login');
        $router->setRoute('/logout', 'logout');
        $router->setRoute('/tasklist', 'tasklist');
      //  $router->setRoute('/form/{id}', 'edit');
    }
    function home()
    { 
       if (!Authorisation::isLoggedInAsEither()) {
            Url::redirect('/login');
       }

       $tasks = [];
        $query = App::$app->db->select("SELECT * FROM task")->getAll();
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
        $params = ["content" => ""];
        if ($id) {
            $query = App::$app->db->select("SELECT * FROM task WHERE id = {$id}")->getAll();
         
            $params = ["content" => $query[0]['task']];
        }
        return ["view" => "form.php",
             "params" => $params];
    }
    function delete($id)
    {
        if ($id) {
            // TODO: DElete here
            // Redirect to main page
        }
    }
    function login()
    {
        return ["view" => "login.php"];
    }
    function logout()
    {
        Authorisation::logout();
        Url::redirect('/');
    }
    function tasklist()
    {
        return ["view" => "tasklist.php"];
    }
}