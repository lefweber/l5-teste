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
              <a href="/details/<?= $movie->id_external ?>" class="btn btn-outline-info">Mais Detalhes</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
  </div>
</main>
