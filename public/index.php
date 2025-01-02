<?php

require __DIR__ . '/../vendor/autoload.php';

use \App\Controllers\HomeController;
use \App\Controllers\DetailsController;
use \App\Controllers\SearchController;

use \App\Controllers\Api\MoviesController;

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

$api_prefix = 'api/v1/';


$routes = [
  'GET' => [
    '' => [HomeController::class, 'index'],
    'details' => [DetailsController::class, 'index'],
    'search' => [SearchController::class, 'index'],
    $api_prefix . 'search/(\w+)' => [MoviesController::class, 'show'],
  ],
];

if (isset($routes[$method])) {
  foreach ($routes[$method] as $pattern => $action) {
    // var_dump(preg_match('#^' . $pattern . '$#', $uri, $matches) . '<BR>');
    if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
      [$controller, $method] = $action;

      if (class_exists($controller) && method_exists($controller, $method)) {
        array_shift($matches);
        (new $controller)->$method($matches);
        exit;
      }
    }
  }
}

http_response_code(404);
echo '404 - Página não encontrada';
