<?php

namespace App\Controllers\Api;

use App\Models\MovieStatus;

class MoviesController extends ApiController
{
    public function like(int $movieId)
    {
      $likes = MovieStatus::addLike($movieId);

      if($likes > 0) {
        $this->sendResponse(['message' => 'Like adicionado com sucesso!', 'likes' => $likes]);
      }
      else {
        $this->sendResponse(['message' => 'Ocorreu um erro no processamento dos likes'], 500);
      }
    }

    public function dislike(int $movieId)
    {
      $dislikes = MovieStatus::addDislike($movieId);

      if($dislikes > 0) {
        $this->sendResponse(['message' => 'Dislike adicionado com sucesso!', 'dislikes' => $dislikes]);
      }
      else {
        $this->sendResponse(['message' => 'Ocorreu um erro no processamento dos dislikes'], 500);
      }
    }
}
