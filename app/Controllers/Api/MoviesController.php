<?php

namespace App\Controllers\Api;

class MoviesController extends ApiController
{
    public function show(array $data = [])
    {
      $this->sendResponse(['message' => 'Busca realizada com sucesso!', 'data' => $data]);
    }
}
