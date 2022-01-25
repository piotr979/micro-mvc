<?php

namespace App\Models;

use App\Controllers\MainController;
use App\Helpers\Dump;
use App\Models\Request;
use App\Services\BasicFormService;
use App\Models\Authorisation;
use App\Views\View;
use Closure;

class Router
{
    protected array $routes = [];
    public Request $request;
    private View $view;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
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
        * Dispatching submitted forms. 
        * Depending on method and form will be redirected to given URL address
        */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($route) {
                case "/form":
                    BasicFormService::processForm($_POST);
                case '/login':
                    Authorisation::login($_POST);
            }
        }
        // Check against regex to find params in URL
        // like route/param or route/1234
        // Code below processes URL params ONLY
        $results = preg_match('/\/(?<route>[a-z]*)\/(?<param>[a-zA-Z0-9]+)/', $route, $matches);
        // if URL contain param pass it on
        if (array_key_exists("param", $matches)) {
            $callback = call_user_func(
                $this->routes[$matches['route']],
                $matches['param']
            );
        } else {
            $routeStripped = trim($route, '/');
            $callback =  call_user_func($this->routes[$routeStripped]);
        }
        if (is_string($callback)) {
            echo $this->view->renderView($callback);
        } else {
           
           $callback['params'] = $callback['params'] ?? '';
           $callback['data'] = $callback['data'] ?? '';
            // TODO: Make params and data optional (with no need to pass empty arrays)
            if (isset($callback['view'])) {
            echo $this->view->renderView($callback['view'], $callback['params'], $callback['data']);
            }
        }
    }
}
