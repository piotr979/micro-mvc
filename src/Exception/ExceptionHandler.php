<?php

declare(strict_types = 1);

namespace App\Exception;

use App\App;
use App\Helpers\Dump;
use ErrorException;
use Throwable;

class ExceptionHandler
{
    public function handle(\Throwable $exception): void
    {
      if (App::$app->isDebugMode()) {
        Dump::printArg($exception);
      } else {
          echo "Exception occurred. Please try again (connection error)?";
      }
    }

    public function convertWarningsAndNoticesToExceptions($severity, $message, $file, $line)
    {
        throw new ErrorException($message,0, $severity, $file, $line);
    }
}