<?php

declare(strict_types = 1);

namespace App\Url;

class Url
{
    public static function redirect(string $url)
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
            $protocol = 'https';
        } else 
        {
            $protocol = 'http';
        }
        header("Location: $protocol://" . $_SERVER['HTTP_HOST']. $url);
    }
}