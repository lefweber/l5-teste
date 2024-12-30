<?php

require __DIR__ . '/../vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SWTube - Uma Plataforma Star Wars</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
        .glow-div{
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
</head>
<body data-bs-theme="dark">

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: fixed; width: 100%; z-index: 1024;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSWTube" aria-controls="navbarSWTube" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><span style="font-size: 1.5rem; font-weight: bold; margin-right: 2px; color: rgba(10, 255, 250, 0.7);">SW</span>Tube</a>
    <div class="collapse navbar-collapse" id="navbarSWTube">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
      </ul>
      <form action="search.php" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<header class="header-space">
  <div id="carouselSWTube" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselSWTube" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselSWTube" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselSWTube" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="img/the-empire-strikes-back.jpg" class="d-block w-100" style="margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block"></div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/return-of-the-jedi.jpg" class="d-block w-100"  style="margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block"></div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/attack-of-the-clones.jpg" class="d-block w-100"  style="margin: 0 auto;" alt="...">
        <div class="carousel-caption d-none d-md-block"></div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSWTube" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselSWTube" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>

<main>
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/the-phantom-menace_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/return-of-the-jedi_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/a-new-hope_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
      </div>
      <div class="row row-space">
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/attack-of-the-clones_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/revenge-of-the-sith_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 glow-div">
            <div class="card">
              <img src="img/the-empire-strikes-back_small.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
              </div>
            </div>
          </div>
      </div>
  </div>
</main>

<footer style="margin-top: 50px;">
      <div class="d-flex justify-content-center align-items-center text-body-tertiary w-100" style="font-size: 0.8rem; height: 50px; background-color: rgb(23, 25, 28);">
        <?php echo Date('Y') . ' - SWTube - Todos os Direitos Reservados'; ?>
      </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
