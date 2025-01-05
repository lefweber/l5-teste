<?php

namespace App\Controllers;

class SearchController extends Controller
{
  public function search()
  {
    $query = filter_var($_GET['q'], FILTER_SANITIZE_STRING);

    if (!$query) {
      new ErrorController('Ocorreu um erro no processamento da busca, verifique o termo pesquisado.', 400);
    }

    $this->view('search', ['query' => $query]);
  }
}
