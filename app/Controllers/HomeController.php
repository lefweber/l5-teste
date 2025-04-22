<?php

namespace App\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
  private $movies;

  public function index()
  {
    $data = $this->getMovies();
    $this->makeMoviesList($data);
    $this->view('home', ['movies' => $this->movies], $this->css(), $this->js());
  }

  private function makeMoviesList($data): void
  {
    $movies = [];
    if (isset($data['movies']) && is_array($data['movies'])) {
      foreach ($data['movies'] as $movieData) {
        $movies[] = new Movie($movieData);
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
    $file = __DIR__ .'/../Views/MainModal/modalStyle.css';
    $css = \file_get_contents($file);

    if ($css === false) {
        echo "Erro ao ler o arquivo.";
        exit; 
    }

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

        .share:hover svg {
          fill:rgb(20, 220, 255) !important;
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

        $css
    </style>
    CSS;
  }

  private function js()
  {
    $file = __DIR__ .'/../Views/MainModal/modalScript.js';
    $script = \file_get_contents($file);

    if ($script === false) {
        echo "Erro ao ler o arquivo.";
        exit; 
    }

    return <<<JS
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

      function share(id) {
        navigator.clipboard.writeText('http://localhost:8000/details/' + id);
        $('#toast').show();
        setTimeout(() => {
          $('#toast').hide();
        }, 3000);
      }

      $script
    </script>
    JS;
  }
}