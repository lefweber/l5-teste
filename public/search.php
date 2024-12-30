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
</head>
<body data-bs-theme="dark">

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: fixed; width: 100%; z-index: 1024;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSWTube" aria-controls="navbarSWTube" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/"><span style="font-size: 1.5rem; font-weight: bold; margin-right: 2px; color: rgba(10, 255, 250, 0.7);">SW</span>Tube</a>
    <div class="collapse navbar-collapse" id="navbarSWTube">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
      </ul>
      <form action="search.php" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main style="padding-top: 100px; padding-bottom: 38px;">
  <div class="container">

    <div class="row" style="margin-bottom: 2rem;">
      <div class="d-flex">
        <svg style="max-width: 3rem; fill: #ffffff45; margin: 5px; margin-right: 15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        <h1>Resultados para <span style="font-size: 1.4rem; color: #ffffff90">"new hope"</span></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/a-new-hope_large.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                <div class="d-flex justify-content-end">
                  <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/a-new-hope_large.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                <div class="d-flex justify-content-end">
                  <a href="details.php" class="btn btn-outline-info">Mais Detalhes</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer>
      <div class="d-flex justify-content-center align-items-center text-body-tertiary w-100" style="font-size: 0.8rem; height: 50px; background-color: rgb(23, 25, 28);">
        <?php echo Date('Y') . ' - SWTube - Todos os Direitos Reservados'; ?>
      </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
