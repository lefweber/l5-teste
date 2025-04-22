function moreDetails(id, title) {
    $.ajax({
      url: 'http://localhost:8001/api/v1/movies/' + id,
      type: 'GET',
      success: function(response) {
        fillModal(response.movie, response.status);
        $('#loading').hide();
        $('#details').show();
      }
    });
  }

  $('#detailModal').on('hidden.bs.modal', function () {
    $('#loading').show();
    $('#details').hide();
    $('#movie-likes').text(''); 
    $('#movie-dislikes').text('');
    $('#movie-views').text('');
  });

  function fillModal(movie, status) {
    $('#movie-image').attr('src', movie.image_url);
    $('#movie-image').attr('alt', movie.title);
    $('#movie-title').text(movie.title);
    $('#movie-synopsis').text(movie.synopsis);
    $('#movie-episode-id').text('Episódio: ' + movie.episode_id);
    $('#movie-release-date').text('Lançamento: ' + movie.release_date);
    $('#movie-age').text('Idade do Filme: ' + movie.age);
    $('#movie-director').text('Direção: ' + movie.director);
    $('#movie-producer').text('Produção: ' + movie.producer);
    $('#movie-characters').empty();
    $.each(movie.characters, function(index, character) {
      $('#movie-characters').append(`
        <div class="d-flex align-items-center">
          <div style="max-width: 80px; background-color: #1b1e22; padding: 5px; border-radius: 10px; padding-bottom: 0; margin: 1rem;">
            <img src="/img/profile.png" alt="${character}" style="max-width: 100%;">
          </div>
          <p style="text-align: center;">${character}</p>
        </div>
      `);
    });
    $('#movie-likes').text(status.likes);
    $('#movie-dislikes').text(status.dislikes);
    $('#movie-views').text(status.views);
    $('#likeButton').data('id-movie', status.id);
    $('#dislikeButton').data('id-movie', status.id);
  }

  $('#likeButton').on('click', () => {
    callApi('http://localhost:8001/api/v1/like/' + $('#likeButton').data('id-movie'), 'likes');
  });

  $('#dislikeButton').on('click', () => {
    callApi('http://localhost:8001/api/v1/dislike/' + $('#dislikeButton').data('id-movie'), 'dislikes');
  });

  function callApi(url, id) {
    $.ajax({
      url: url,
      type: 'PATCH',
      success: function(response) {
        if(id == 'likes') {
          $('#movie-likes').text(response.likes);
        }
        else {
          $('#movie-dislikes').text(response.dislikes);
        }
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
      }
    });
  }