<?php

namespace App\Controllers;

class HomeController extends Controller
{

  private $movies;

  public function index()
  {
    $this->getAllMoviesFromExternalApi();
    $this->view('home', ['movies' => $this->movies], $this->css());
  }

  public function getAllMoviesFromExternalApi(): void
  {
    $url = 'https://swapi.tech/api/films';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode === 200 && $response !== false) {
      $data = json_decode($response, true);

      if(isset($data['message']))
        if($data['message'] == 'ok') {
          $this->movies = $data;
        }
        else {
          $this->view('error', [
            'code' => 500,
            'error' => 'API dos filmes Star Wars não está retornando dados. Verifique o Rate Limiting.',
          ]);
          exit;
        }
    } else {
      $this->view('error', [
        'code' => 500,
        'error' => 'Não foi possível se comunicar com a API dos filmes Star Wars, por favor, verifique a sua conexão.',
      ]);
      exit;
    }
  }

  private function css()
  {
    return <<<CSS
    <style>
        .glow-div {
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            transition: box-shadow 0.3s ease-in-out;
        }

        .glow-div:hover {
            box-shadow: 0 0 15px 5px rgba(10, 255, 250, 0.7);
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
