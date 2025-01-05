<?php

namespace App\Models;

use App\Services\Database;

class Log {
  public static function save(string $message)
  {
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);

    $callerClass = $backtrace[1]['class'] ?? 'Desconhecida';

    Database::execute(
      'INSERT INTO logs (class_name, message) VALUES (?, ?)',
      [$callerClass, $message]
    );
  }
}
