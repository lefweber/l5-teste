<?php

namespace App\Controllers;

use App\Models\Movie;

class DetailsController extends Controller
{
  private $movie;

  public function index($movieId)
  {
    $this->getMovieFromExternalApi($movieId);
    $this->view('details', ['movie' => $this->movie], $this->css());
  }

  private function getMovieFromExternalApi($movieId): void
  {
    if(!is_numeric($movieId)) {
      new ErrorController('Há algum problema com a URL solicitada.', 400);
    }

    $data = $this->callToExternalStarWarsAPI("films/$movieId");
    $this->movie = new Movie($data['result']['properties']);
  }

  private function css(): string
  {
    return <<<CSS
      <style>
        .wrapper {
          display: grid;
          grid-template-columns: repeat(1, 1fr);
          column-gap: 10px;
          row-gap: 1em;
        }

        @media (min-width: 575px) {
          .wrapper {
            grid-template-columns: repeat(2, 1fr);
          }
        }

        @media (min-width: 1199px) {
          .wrapper {
            grid-template-columns: repeat(4, 1fr);
          }
        }
      </style>
    CSS;
  }
}
