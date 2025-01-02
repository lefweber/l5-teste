<?php

namespace App\Controllers\Api;

/**
 * The base controller for all API controllers
 */
class ApiController
{
  /**
   * Sends a JSON response to the client
   *
   * @param array $data The data to send in the response body
   * @param int $code The HTTP status code of the response
   *
   * @return void
   */
  protected function sendResponse(array $data, int $code = 200): void
  {
    http_response_code($code);
    header('Content-Type: application/json');

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
  }
}
