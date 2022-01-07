<?php

namespace App\Services;

use App\Helpers\Dump;
use App\Contracts\HandlingFormInterface;
class BasicFormService implements HandlingFormInterface
{
    public static function processForm($formData)
    {
        Dump::dump($formData);
    }
}