<?php

namespace App\Models;

use App\Controllers\MainController;
use App\Helpers\Dump;
use App\Models\Request;
use Closure;

class Router
{
    protected array $routes = [];

    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }
   function tester($tst)
    {
        echo "tester";
    } 
    public function resolve() 
    {
        $this->request->getPath();
    }
    function barber($type)
{
    echo "You wanted a $type haircut, no problem\n";
}
  

   public function setRoute($route, $fncName)
   {
  
    $routing = trim($route, '/');
    
    // to pass function as parameter conversion to callback is required
    $callback = Closure::fromCallable([new MainController, $fncName]);
    $this->routes[$routing] = $callback;
   }

    public function dispatch($action)
    {
        $callback = trim($action, '/');
        echo call_user_func($this->routes[$callback]);
    }
   
}