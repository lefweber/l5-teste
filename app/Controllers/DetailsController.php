<?php

namespace App\Controllers;

use App\Models\Movie;

class DetailsController extends Controller
{
  private $movie;

  private $characters;

  public function index($movieId)
  {
    $this->getMovieFromExternalApi($movieId);
    $this->view('details', ['movie' => $this->movie, 'characters' => $this->characters], $this->css(), $this->js());
  }

  private function getMovieFromExternalApi($movieId): void
  {
    if(!is_numeric($movieId)) {
      new ErrorController('Há algum problema com a URL solicitada.', 400);
    }

    $data = $this->callToExternalStarWarsAPI("films/$movieId");
    $this->movie = new Movie($data['result']['properties']);

    $charactersData = $this->callToExternalStarWarsAPI('people?page=1&limit=100');

    $characters = [];

    foreach ($this->movie->characters as $characterId) {
      foreach ($charactersData['results'] as $character) {
        if($character['uid'] == $characterId) {
          array_push($characters, $character['name']);
          continue;
        }
      }
    }

    $this->characters = $characters;
  }

  private function css(): string
  {
    return "
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
    ";
  }

  private function js(): string
  {
    return "
      <script>
        alert('hi');
      </script>
    ";
  }
}
