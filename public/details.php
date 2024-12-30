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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <img src="img/revenge-of-the-sith_large.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
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
