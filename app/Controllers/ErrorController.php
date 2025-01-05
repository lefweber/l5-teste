<?php

namespace App\Controllers;

use App\Models\Log;

class ErrorController extends Controller
{
    public function __construct(string $error = '', int $code = 401)
    {
      Log::save("($code) $error");
      $this->view('error', ['message' => $error, 'code' => $code]);
      exit;
    }
}
