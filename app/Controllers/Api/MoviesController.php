<?php

namespace App\Controllers\Api;

use App\Models\MovieStatus;

class MoviesController extends ApiController
{
    public function show(array $data = [])
    {
      $this->sendResponse(['message' => 'Busca realizada com sucesso!', 'data' => $data]);
    }

    public function like(int $movieId)
    {
      $likes = MovieStatus::addLike($movieId);

      if($likes > 0) {
        $this->sendResponse(['message' => 'Like realizado com sucesso!', 'likes' => $likes]);
      }
      else {
        $this->sendResponse(['message' => 'Ocorreu um erro no processamento dos likes'], 500);
      }
    }
}
