<?php

namespace App\Controllers;

use App\Models\Log;
use App\Models\Movie;

class SearchController extends Controller
{

  private $data;
  private $movies;

  public function index()
  {
    $query = filter_var($_GET['q'], FILTER_SANITIZE_STRING);
   
    if ($query) {
      $this->data = $this->getMovies();
      $this->search($query);
      Log::save("Realizada uma busca pelo termo '$query'");
      $this->view('search', ['query' => $query, 'movies' => $this->movies], $this->css(), $this->js());
      exit;
    }

    $this->view('search');
  }

  private function search($query): void
  {
    $movies = [];

    if (isset($this->data['movies']) && is_array($this->data['movies'])) {
      foreach ($this->data['movies'] as $movieData) {
        $producer = $movieData['producer'];
        $title = $movieData['title'];
        $director = $movieData['director'];
        $opening_crawl = $movieData['opening_crawl'];

        if (stripos($producer, $query) !== false || stripos($title, $query) !== false || stripos($director, $query) !== false || stripos($opening_crawl, $query) !== false) {
          $movies[] = new Movie($movieData);
        }
      }
    }

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

    return "<style>$css</style>";
  }

  private function js()
  {
    $file = __DIR__ .'/../Views/MainModal/modalScript.js';
    $script = \file_get_contents($file);

    if ($script === false) {
        echo "Erro ao ler o arquivo.";
        exit; 
    }

    return "<script>$script</script>";
  }
}
