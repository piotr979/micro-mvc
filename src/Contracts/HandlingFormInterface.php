<?php

namespace App\Contracts;

interface HandlingFormInterface
{
    public static function processForm($formData);
}