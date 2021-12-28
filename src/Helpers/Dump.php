<?php
namespace App\Helpers;
/* makes dumping easier to read
*
*/
class Dump
{
    public static function dump($arg)
    {
        echo "<div style='background-color: black; color: white'>";
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
        echo '</div>';
    } 
}