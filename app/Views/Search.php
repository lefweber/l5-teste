<main style="padding-top: 100px; padding-bottom: 38px;">
  <div class="container">

    <div class="row" style="margin-bottom: 2rem;">
      <div class="d-flex">
        <svg style="max-width: 3rem; fill: #ffffff45; margin: 5px; margin-right: 15px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        <h1>Resultados para <span style="font-size: 1.4rem; color: #ffffff90">"<?= $query ?>"</span></h1>
      </div>
    </div>


    <?php
      foreach ($movies as $movie):
    ?>
    <div class="row">
      <div class="col-12">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= $movie->small_image_url ?>" class="img-fluid rounded-start" alt="<?= $movie->title ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $movie->title ?></h5>
                <p class="card-text" style="min-height: 48px;"><?= $movie->short_synopsis ?></p>
                <div class="d-flex justify-content-end" style="padding-top: 65px;">
                  <a class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailModal" onClick="moreDetails('<?= $movie->id_external ?>', '<?= $movie->title ?>')">Mais Detalhes</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</main>

<?php include __DIR__ . '/MainModal/modalBody.html'; ?>
