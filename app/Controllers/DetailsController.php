<?php

namespace App\Controllers;

use App\Models\Movie;

class DetailsController extends Controller
{
  private $movie;

  public function index($movieId)
  {
    $this->getMovieFromExternalApi($movieId);
    $this->view('details', ['movie' => $this->movie]);
  }

  private function getMovieFromExternalApi($movieId): void
  {
    if(!is_numeric($movieId)) {
      new ErrorController('Há algum problema com a URL solicitada.', 400);
    }

    $url = "https://swapi.tech/api/films/$movieId";
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
          $this->movie = new Movie($data['result']['properties']);
        }
        else {
          new ErrorController('Houve um problema na recepção dos dados da API externa.', 500);
        }
    } else {
      new ErrorController('Não foi possível se comunicar com a API dos filmes Star Wars, por favor, verifique a sua conexão.', 500);
    }
  }
}
