<?php

$env = parse_ini_file(".env");

$host = $env['DB_HOST'];
$port = $env['DB_PORT'];
$dbname = $env['DB_NAME'];
$user =  $env['DB_USER'];
$password = $env['DB_PASSWORD'];

try {
  $pdo = new PDO("mysql:host=$host;port={$env['DB_PORT']}", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
  echo "Banco de dados '$dbname' criado ou já existente.\n";

  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
      CREATE TABLE IF NOT EXISTS movies_statuses (
          id INT AUTO_INCREMENT PRIMARY KEY,
          id_external INT NOT NULL UNIQUE,
          likes INT DEFAULT 0,
          dislikes INT DEFAULT 0,
          views INT DEFAULT 0,
          slug VARCHAR(255) UNIQUE
      );

      INSERT IGNORE INTO movies_statuses (id_external, likes, dislikes, views, slug)
      VALUES
        (1, 0, 0, 0, 'a-new-hope'),
        (2, 0, 0, 0, 'the-empire-strikes-back'),
        (3, 0, 0, 0, 'return-of-the-jedi'),
        (4, 0, 0, 0, 'the-phantom-menace'),
        (5, 0, 0, 0, 'attack-of-the-clones'),
        (6, 0, 0, 0, 'revenge-of-the-sith');

      CREATE TABLE IF NOT EXISTS logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        class_name VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
      );
  ";

  $pdo->exec($sql);

  echo "Tabelas migradas com sucesso!\n";
} catch (PDOException $e) {
  echo "Erro na migração!\n" . $e->getMessage() . "\n";
  exit(1);
}
