<?php

namespace App\Controllers\Api;

use App\Models\Log;
use App\Models\MovieStatus;

class MoviesController extends ApiController
{
    public function like(int $movieId)
    {
      $likes = MovieStatus::addLike($movieId);

      if($likes > 0) {
        Log::save("Adicionado um LIKE ao vídeo de id $movieId");
        $this->sendResponse(['message' => 'Like adicionado com sucesso!', 'likes' => $likes]);
      }
      else {
        Log::save("Ocorreu um erro ao adicionar um LIKE no vídeo de id $movieId");
        $this->sendResponse(['message' => 'Ocorreu um erro no processamento dos likes'], 500);
      }
    }

    public function dislike(int $movieId)
    {
      $dislikes = MovieStatus::addDislike($movieId);

      if($dislikes > 0) {
        Log::save("Adicionado um DISLIKE ao vídeo de id $movieId");
        $this->sendResponse(['message' => 'Dislike adicionado com sucesso!', 'dislikes' => $dislikes]);
      }
      else {
        Log::save("Ocorreu um erro ao adicionar um DISLIKE no vídeo de id $movieId");
        $this->sendResponse(['message' => 'Ocorreu um erro no processamento dos dislikes'], 500);
      }
    }
}
