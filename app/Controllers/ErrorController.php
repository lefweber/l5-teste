<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function __construct(string $error = '', int $code = 401)
    {
      $this->view('error', ['message' => $error, 'code' => $code]);
      exit;
    }
}
