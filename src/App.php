<?php

namespace App;

use App\Models\Request;
use App\Models\Router;
class App 
{
    public Request $request;
    public Router $router;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router();
    }
    public function run()
    {
       $this->router->resolve();
    }
}