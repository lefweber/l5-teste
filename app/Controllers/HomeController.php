<?php

namespace App\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
  private $movies;

  public function index()
  {
    $this->getAllMoviesFromExternalApi();
    $this->view('home', ['movies' => $this->movies], $this->css());
  }

  private function getAllMoviesFromExternalApi(): void
  {
    $data = $this->callToExternalStarWarsAPI('films');
    $this->makeMoviesList($data);
  }

  private function makeMoviesList($data): void
  {
    $movies = [];
    if (isset($data['result']) && is_array($data['result'])) {
      foreach ($data['result'] as $movieData) {
        $movieData['properties']['uid'] = $movieData['uid'];
        $movies[] = new Movie($movieData['properties']);
      }
    }

    usort($movies, function($a, $b) {
      $dateA = \DateTime::createFromFormat('d/m/Y', $a->release_date);
      $dateB = \DateTime::createFromFormat('d/m/Y', $b->release_date);

      return $dateA <=> $dateB;
    });

    $this->movies = $movies;
  }

  private function css()
  {
    return <<<CSS
    <style>
        .glow-div {
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            transition: box-shadow 0.3s ease-in-out, top 0.2s ease-in-out;
            margin-bottom: 20px;
            margin-top: 20px;
            position: relative;
            top: 0px;
        }

        .glow-div:hover {
            box-shadow: 0 0 15px 5px rgba(10, 255, 250, 0.7);
            top: -10px;
        }

        .row-space {
            margin-top: 20px;
        }

        .header-space {
            padding-top: 62px;
            padding-bottom: 50px;
        }

        @media(max-width: 768px) {
            .glow-div {
                margin-top: 20px;
                margin-bottom: 0;
            }

            .row-space {
                margin-top: 0px;
            }

            .header-space {
                padding-bottom: 10px;
            }

            .carousel-indicators {
                display: none;
            }
        }
    </style>
    CSS;
  }
}
