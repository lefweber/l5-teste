<?php

$host = '127.0.0.1';
$dbname = 'l5teste';
$user = 'root';
$password = 'root';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
      CREATE TABLE IF NOT EXISTS movies (
          id INT AUTO_INCREMENT PRIMARY KEY,
          id_external INT NOT NULL UNIQUE,
          likes INT DEFAULT 0,
          dislikes INT DEFAULT 0
      );
  ";

  $pdo->exec($sql);

  echo "Tabelas migradas com sucesso!\n";
} catch (PDOException $e) {
  echo "Erro ao conectar ou criar as tabelas: " . $e->getMessage() . "\n";
  exit(1);
}
