<main style="padding-top: 100px; padding-bottom: 38px;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <img src="<?= $movie->image_url ?>" class="card-img-top" alt="<?= $movie->title ?>">
          <div class="card-body">
            <h2 class="card-title"><?= $movie->title ?></h2>
            <p class="card-text"><?= $movie->synopsis ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Número do Epiódio: <?= $movie->episode_id ?></li>
            <li class="list-group-item">Lançamento: <?= $movie->release_date ?></li>
            <li class="list-group-item">Idade do Filme: <?= $movie->age ?></li>
            <li class="list-group-item">Direção: <?= $movie->director ?></li>
            <li class="list-group-item">Produção: <?= $movie->producer ?></li>
            <li class="list-group-item">
              <div>Personagens:</div>
              <div class="wrapper">

              <?php
                foreach ($characters as $character):
              ?>
                <div class="d-flex align-items-center flex-column">
                  <div style="max-width: 150px; background-color: #1b1e22; padding: 5px; border-radius: 10px; padding-bottom: 0; margin: 1rem;">
                    <img src="/img/profile.png" alt="<?= $character ?>" style="max-width: 100%;">
                  </div>
                  <p style="text-align: center;"><?= $character ?></p>
                </div>
              <?php
                endforeach;
              ?>

              </div>
            </li>
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
