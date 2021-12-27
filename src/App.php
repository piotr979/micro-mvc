<?php

namespace App;
use App\Request;
class App 
{
    public Request $request;
    public function __construct()
    {
        $this->request = new Request();
    }
    public function run()
    {
        $this->request->resolve();
    }
}