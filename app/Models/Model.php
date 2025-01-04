<?php

namespace App\Models;

use App\Services\Database;
use App\Controllers\ErrorController;

/**
 * The base Model for all Models
 */
class Model {
  protected static function first(string $model, int $id): ?array
  {
    if(!is_numeric($id)) {
      new ErrorController('A consulta não é válida.', 400);
    }

    $sql = "SELECT * FROM $model WHERE id = ?";

    return Database::queryOne($sql, [$id]);
  }
}
