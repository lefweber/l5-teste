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
    $this->getMovieFromExternalApi($movieId);
    $this->view('details', ['movie' => $this->movie, 'characters' => $this->characters, 'idMovie' => MovieStatus::$id, 'likes' => MovieStatus::$likes, 'dislikes' => MovieStatus::$dislikes, 'views' => MovieStatus::$views], $this->css(), $this->js());
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

        #arrowUP svg {
          fill: #ffffff70;
          width: 50px;
          position: fixed;
          bottom: 18px;
          right: 18px;
          cursor: pointer;
        }

        .arrowHide {
          display: none;
        }

        .controls {
          width: 120px;
          padding: 10px;
          margin-right: 10px;
          border-radius: 50px;
          background-color: #272a2d;
          cursor: pointer;
          display: flex;
          align-items: center;
          border: 0;
        }

        .controls p {
          padding-left: 12px;
          font-weight: bold;
          margin-bottom: 0;
        }

        .controls:hover {
          background-color:rgb(64, 67, 70);
        }

        .controls_button:hover svg {
          fill:rgb(255, 61, 61) !important;
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
        const page = document.querySelector('#details');
        const arrow = document.querySelector('#arrowUP');
        const likeButton = document.querySelector('#likeButton');
        const dislikeButton = document.querySelector('#dislikeButton');

        window.addEventListener('scroll', () => {
          if (Math.abs(page.getBoundingClientRect().top) > 600) {
            arrow.classList.remove('arrowHide');
          }
          else {
            arrow.classList.add('arrowHide');
          }
        });

        arrow.addEventListener('click', () => {
          window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth Scroll
          });
        });

        likeButton.addEventListener('click', () => {
          callApi('http://localhost:8000/api/v1/like/' + likeButton.dataset.idMovie, 'likes');
        });

        dislikeButton.addEventListener('click', () => {
          callApi('http://localhost:8000/api/v1/dislike/' + dislikeButton.dataset.idMovie, 'dislikes');
        });

        async function callApi(url, id) {
          try {
            const response = await fetch(url, {
              method: 'PATCH',
            });

            if (!response.ok) {
              throw new Error('Response status: ' + response.message);
            }

            const json = await response.json();

            if(id == 'likes') {
              document.querySelector('#likes').innerHTML = json.likes;
            }
            else {
              document.querySelector('#dislikes').innerHTML = json.dislikes;
            }

            console.log(json);
          } catch (error) {
            console.error(error.message);
          }
        }
      </script>
    ";
  }
}
