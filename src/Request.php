<?php

namespace App;

class Request 
{
    public function resolve()
    {
        $this->getURIPath();
    }
    public function getURIPath()
    {

        var_dump($_SERVER);
    }
}