<?php

namespace App\Controllers;

class HomeController extends Controller
{
  public function index()
  {
    return $this->view('home', [], $this->css());
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
