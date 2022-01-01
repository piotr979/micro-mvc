<?php

namespace App\Models;

use App\Controllers\MainController;
use App\Helpers\Dump;
use App\Models\Request;
use App\Services\BasicFormService;
use Closure;

class Router
{
    protected array $routes = [];

    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }
    public function resolve() 
    {
        $this->request->getPath();
    }

    /**
     * Sets new route
     * @param $route string Route link like '/main'
     * @param $fncName string function name
     */

    public function setRoute($route, $call)
    {
   
     $routing = trim($route, '/');
     // to pass function as parameter conversion to callback is required
     $callback = Closure::fromCallable([new MainController, $call]);
     $this->routes[$routing] = $callback;
    }
 
    /**
     * Calls defined function assigned to route
     */
     public function dispatch($route)
     {

        /*
        * Dispatching submitted forms stars here. 
        * Depending on method and form will be redirected to given URL address
        */
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            switch ($route) {
                case "/form": BasicFormService::processForm($_POST);
            }
         } 
         /* Dispatching forms ends here */

         $callback = trim($route, '/');
         
         $view =  call_user_func($this->routes[$callback]);
         $reso =  $this->renderView($view);
         echo $reso;
     }

     public function renderView($view)
     {
         ob_start();
         include_once SRC_DIR . "/Views/{$view}";
         return ob_get_clean();
     }
    
 }