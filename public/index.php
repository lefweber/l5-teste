<?php

require __DIR__ . '/../vendor/autoload.php';

use \App\Controllers\HomeController;
use \App\Controllers\DetailsController;
use \App\Controllers\SearchController;

$uri = trim($_SERVER['REQUEST_URI'], '/');
$routes = [
    '' => [HomeController::class, 'index'],
    'details' => [DetailsController::class, 'index'],
    'search' => [SearchController::class, 'index'],
];
if (array_key_exists($uri, $routes)) {
  [$controller, $method] = $routes[$uri];

  if (class_exists($controller) && method_exists($controller, $method)) {
      echo (new $controller)->$method();
      exit;
  }
}

http_response_code(404);
echo '404 - Página não encontrada';
