<?php

namespace App;

use App\Models\Request;
use App\Models\Router;
use App\Controllers\MainController;
use App\Models\Authorisation;
use App\Models\Database\PDOClient;
use App\Helpers\Url;
use App\Models\Entity\User;

class App 
{
    public Request $request;
    public Router $router;
    public MainController $mainController;
    public PDOClient $db;
    public User $user;
    public static App $app;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router();
        $this->mainController = new MainController();
        $this->user = new User();
        $this->env = APP_ENV;
        $this->db = new PDOClient(DB_DRIVER,DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }
    public function run()
    {
       set_error_handler([ new \App\Exception\ExceptionHandler, 'convertWarningsAndNoticesToExceptions']);
       set_exception_handler([new \App\Exception\ExceptionHandler, 'handle']);
       $this->db->connect();
       $this->mainController->attachRoutes($this->router);
       session_start();
      
    }

    public function isDebugMode(): bool
    {
        return APP_ENV == 'dev' ? true : false;
    }
}