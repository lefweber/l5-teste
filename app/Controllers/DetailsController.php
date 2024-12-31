<?php

namespace App\Controllers;

class DetailsController extends Controller
{
    public function index()
    {
      return $this->view('details');
    }
}
