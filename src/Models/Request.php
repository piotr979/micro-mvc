<?php

namespace App\Models;

use App\Helpers\Dump;

class Request 
{
    public function getPath()
    {

       $urlString = $_SERVER['REQUEST_URI'];
        if ($urlString) {
            echo "test";
        }
       $urlString = trim($urlString);
       Dump::dump($urlString);
        }
}