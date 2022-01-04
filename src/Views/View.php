<?php

namespace App\Views;

class View
{
    public function renderView($view, $params = [])
    {
       foreach ($params as $key => $value) {
           $$key = $value;
       }
        ob_start();
        include_once ROOT_DIR . "/templates/{$view}";
        return ob_get_clean();
    }
}