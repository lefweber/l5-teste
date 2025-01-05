<?php

namespace App\Services;

class Database {
    private static $pdo;

    public static function getConnection()
    {
      if (self::$pdo === null) {
        $env = parse_ini_file("../.env");
        self::$pdo = new \PDO("mysql:host={$env['DB_HOST']};port={$env['DB_PORT']};dbname={$env['DB_NAME']}", "{$env['DB_USER']}", "{$env['DB_PASSWORD']}");
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      }

      return self::$pdo;
    }

    public static function queryOne(string $sql, array $params = []): ?array
    {
      $pdo = self::getConnection();
      $stmt = $pdo->prepare($sql);
      $stmt->execute($params);

      return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public static function execute(string $sql, array $params = []): bool
    {
      $pdo = self::getConnection();
      $stmt = $pdo->prepare($sql);

      return $stmt->execute($params);
    }
}
