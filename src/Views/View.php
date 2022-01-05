<?php

namespace App\Views;

use App\Helpers\Dump;

class View
{
    public function renderView($view, $params = [])
    {
       foreach ($params as $key => $value) {
           $$key = $value;
          Dump::dump($$key);
       }
        ob_start();
        include_once ROOT_DIR . "/templates/{$view}";
        return ob_get_clean();
    }
}