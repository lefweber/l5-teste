<?php

namespace App\Controllers;

use App\Models\Movie;
use App\Models\MovieStatus;

class DetailsController extends Controller
{
  private $movie;

  private $characters;

  public function index($movieId)
  {
    MovieStatus::addView($movieId);
    MovieStatus::getStatus($movieId);
    $this->movie = $this->getMovies($movieId);
    $this->view('details', $this->movie, $this->css(), $this->js());
  }

  private function css()
  {
    $file = __DIR__ .'/../Views/MainModal/modalStyle.css';
    $css = \file_get_contents($file);

    if ($css === false) {
        echo "Erro ao ler o arquivo.";
        exit; 
    } 

    return "<style>$css</style>";
  }

  private function js()
  {
    return <<<JS
    <script>
      $('#likeButton').on('click', () => {
        callApi('http://localhost:8001/api/v1/like/' + $('#likeButton').data('id-movie'), 'likes');
      });

      $('#dislikeButton').on('click', () => {
        callApi('http://localhost:8001/api/v1/dislike/' + $('#dislikeButton').data('id-movie'), 'dislikes');
      });

      function callApi(url, id) {
        $.ajax({
          url: url,
          type: 'PATCH',
          success: function(response) {
            if(id == 'likes') {
              $('#movie-likes').text(response.likes);
            }
            else {
              $('#movie-dislikes').text(response.dislikes);
            }
          },
          error: function(xhr, status, error) {
            console.error('Error:', error);
          }
        });
      }
    </script>
    JS;
  }
}