<?php

namespace App\Views;

class LoginFormBuilder
{
    public static function begin(string $method, string $action)
    {
        echo sprintf('<form method="%s" action="%s">', $method, $action);
    }
    public static function inputField(string $type, string $name, string $value = "")
    {
        echo sprintf('<input type="%s" name="%s" value="%s" class="form-control" />', $type, $name, $value);
    }
    public static function end()
    {
        echo '</form>';
    }
    public static function hasError()
    {
      return true;
    }
}
