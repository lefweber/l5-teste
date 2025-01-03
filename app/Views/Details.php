<main id="details" style="padding-top: 100px; padding-bottom: 38px;">
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
        </div>

        <div class="d-flex justify-content-end" style="margin-top: 20px;">
          <div class="controls">
            <svg style="fill: #ffffff; width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
            <p>10</p>
          </div>
          <div class="controls">
            <svg style="fill: #ffffff; width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M119.4 44.1c23.3-3.9 46.8-1.9 68.6 5.3l49.8 77.5-75.4 75.4c-1.5 1.5-2.4 3.6-2.3 5.8s1 4.2 2.6 5.7l112 104c2.9 2.7 7.4 2.9 10.5 .3s3.8-7 1.7-10.4l-60.4-98.1 90.7-75.6c2.6-2.1 3.5-5.7 2.4-8.8L296.8 61.8c28.5-16.7 62.4-23.2 95.7-17.6C461.5 55.6 512 115.2 512 185.1l0 5.8c0 41.5-17.2 81.2-47.6 109.5L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9L47.6 300.4C17.2 272.1 0 232.4 0 190.9l0-5.8c0-69.9 50.5-129.5 119.4-141z"/></svg>
            <p>10</p>
          </div>
          <div class="controls" style="cursor: default; background-color: #212529;">
            <svg style="fill: #ffffff; width: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
            <p>10</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<nav id="arrowUP" class="arrowHide">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</nav>
