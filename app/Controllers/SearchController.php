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
      $this->data = $this->callToExternalStarWarsAPI('films');
      $this->search($query);
      Log::save("Realizada uma busca pelo termo '$query'");
      $this->view('search', ['query' => $query, 'movies' => $this->movies]);
      exit;
    }

    $this->view('search');
  }

  private function search($query): void
  {
    $movies = [];

    if (isset($this->data['result']) && is_array($this->data['result'])) {
      foreach ($this->data['result'] as $movieData) {
        $producer = $movieData['properties']['producer'];
        $title = $movieData['properties']['title'];
        $director = $movieData['properties']['director'];
        $opening_crawl = $movieData['properties']['opening_crawl'];

        if (stripos($producer, $query) !== false || stripos($title, $query) !== false || stripos($director, $query) !== false || stripos($opening_crawl, $query) !== false) {
          $movieData['properties']['uid'] = $movieData['uid'];
          $movies[] = new Movie($movieData['properties']);
        }
      }
    }

    $this->movies = $movies;
  }
}
