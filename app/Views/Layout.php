<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SWTube - Uma Plataforma Star Wars</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <?= $css ?>
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

        <?php
          if ($viewName != 'home'):
        ?>
        <li class="nav-item">
            <div class="d-flex align-items-center">
              <svg style="fill: #ffffff65; width: 20px; margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
              <a class="nav-link" style="font-weight: bold;" href="/">
                Voltar ao Catálogo
              </a>
            </div>
        </li>
        <?php endif; ?>

      </ul>
      <form action="/search" class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<?php echo $viewContent ?>

<footer style="margin-top: 50px;">
      <div class="d-flex justify-content-center align-items-center text-body-tertiary w-100" style="font-size: 0.8rem; height: 50px; background-color: rgb(23, 25, 28);">
        <?php echo Date('Y') . ' - SWTube - Todos os Direitos Reservados'; ?>
      </div>
</footer>

<script src="/js/bootstrap.bundle.min.js"></script>

<?= $js ?>

</body>
</html>
