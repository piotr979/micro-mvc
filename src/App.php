<?php

namespace App;

use App\Models\Request;
use App\Models\Router;
use App\Controllers\MainController;
use App\Database\PDOClient;

class App 
{
    public Request $request;
    public Router $router;
    public MainController $mainController;
    public PDOClient $db;
    public static App $app;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router();
        $this->mainController = new MainController();
        $this->db = new PDOClient(DB_DRIVER,DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }
    public function run()
    {
       $this->db->connect();
       $this->mainController->attachRoutes($this->router);
    }
}