<?php

namespace App;

use App\Models\Request;
use App\Models\Router;
use App\Controllers\MainController;
class App 
{
    public Request $request;
    public Router $router;
    public MainController $mainController;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router();
        $this->mainController = new MainController();
    }
    public function run()
    {
       
      // $this->router->resolve();

       $this->mainController->attachRoutes($this->router);
    }
}