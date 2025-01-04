<?php

namespace App\Models;

use App\Services\Database;

class MovieStatus extends Model
{
  private static $model = 'movies_statuses';

  public $id;
  public $id_external;
  public $likes;
  public $dislikes;
  public static $views;
  public $slug;

  public static function addView(int $id): bool
  {
    $movie = parent::first(self::$model, $id);

    if(is_null($movie)) {
      return false;
    }

    self::$views = $movie['views'] + 1;

    return Database::execute('UPDATE ' . self::$model . ' SET views = ? WHERE id = ?', [self::$views, $movie['id']]);
  }
}
