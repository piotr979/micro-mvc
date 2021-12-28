<?php

namespace App\Models;

use App\Helpers\Dump;
use App\Models\Request;

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
function demo($value)
{
    echo "This is $value site.\n";
}
  

    public function get($routePath, $params)
    {

        $this->routes['get'][$routePath] = $params;
        call_user_func(__NAMESPACE__ . '\Router::demo', "GeeksforGeeks");

        Dump::dump($this->routes);
    }
    
   
}