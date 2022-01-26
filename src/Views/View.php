<?php

namespace App\Views;

use App\Helpers\Dump;

/**
 * How does the view work?
 * 
 *  Params and data being sent from MainController
 *  They can be null (one of them or both)
 *  They are attached to callback and pass to this class
 *  Params (passed with URL) are called params in templates
 *  Any other data is called "data" in templates
 */
class View
{
        public function renderView($view, $params = [], $data = [])
        {
            ob_start();
            $params = $params;
            $data = $data;
            include ROOT_DIR . "/templates/{$view}";
            return ob_get_clean();
        }
        private function prepareForTemplate($data)
        {
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    $$key = $value;
                }
            }
        }
}




