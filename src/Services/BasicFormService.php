<?php

namespace App\Services;

use App\Helpers\Dump;
use App\Contracts\HandlingBasicFormInterface;
class BasicFormService implements HandlingBasicFormInterface
{
    public static function processForm($formData)
    {
        Dump::dump($formData);
    }
}