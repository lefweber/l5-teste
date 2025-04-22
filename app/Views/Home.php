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

        <?php
          $count = 1;
          foreach ($movies as $movie):
            if ($count == 3) {
                echo '</div><div class="row row-space">';
                $count = 1;
            }
        ?>
        <div class="col-12 col-md-4 glow-div">
          <div class="card">
            <img src="<?= $movie->small_image_url ?>" class="card-img-top" alt="<?= $movie->title ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $movie->title ?></h5>
              <p>Lançamento: <span class="text-info"><?= $movie->release_date ?></span></p>
              <p class="card-text" style="min-height: 72px;"><?= $movie->short_synopsis ?></p>
              <div class="d-flex justify-content-between">
                <a class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal" onClick="moreDetails('<?= $movie->id_external ?>', '<?= $movie->title ?>')">Mais Detalhes</a>
                <div class="share" onClick="share('<?= $movie->id_external ?>')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copiar para Compartilhar" style="cursor: pointer;">
                  <svg style="fill: #ffffff; width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M307 34.8c-11.5 5.1-19 16.6-19 29.2l0 64-112 0C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96l96 0 0 64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/></svg>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
  </div>
</main>

<div id="toast" style="display: none; position: fixed; bottom: 0; right: 0; z-index: 1024;">
  <p style="margin-right: 10px; background-color:rgb(35, 173, 207); padding: 10px; padding-left: 30px; padding-right: 30px; border-radius: 5px;">Link Copiado</p>
</div>

<?php include __DIR__ . '/MainModal/modalBody.html'; ?>