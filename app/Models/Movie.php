<?php

namespace App\Models;

class Movie
{
  public $title;
  public $synopsis;
  public $short_synopsis;
  public $slug;
  public $image_url;
  public $small_image_url;
  public $id_external;
  public $director;
  public $producer;
  public $episode_id;
  public $release_date;
  public $age;
  public $characters;

  public function __construct(array $data)
  {
    $this->title = $data['title'] ?? null;

    $this->synopsis = $data['opening_crawl'] ?? null;

    $this->short_synopsis = $data['short_synopsis'];

    $this->slug = strtolower(str_replace(' ', '-', $this->title));

    $this->image_url = '/img/' . $this->slug  . '_large.jpg';

    $this->small_image_url = '/img/' . $this->slug  . '_small.jpg';

    $this->id_external = $data['id_external'];

    $this->director = $data['director'];

    $this->producer = $data['producer'];

    $this->episode_id = $data['episode_id'];

    $this->release_date = $data['release_date'];

    $this->age = $this->getAge(date("m/d/Y", strtotime($data['release_date'])));

    $this->extractCharacters($data['characters']);
  }

  private function getAge($date): string
  {
    $releaseDate = new \DateTime($date);
    $currentDate = new \DateTime();
    $interval = $releaseDate->diff($currentDate);

    $age = [$interval->y, $interval->m, $interval->d];

    $age[0] .= $age[0] > 1 ? ' anos, ' : ' ano, ';
    $age[1] .= $age[1] > 1 ? ' meses e ' : ' mês e ';
    $age[2] .= $age[2] > 1 ? ' dias' : ' dia';

    return implode($age);
  }

   private function extractCharacters(array $charactersList): void
  {
    $characters = [];

    foreach ($charactersList as $characterItem) {
      $slashPos = strrpos($characterItem, '/');
      $characterId = substr($characterItem, $slashPos+1);
      array_push($characters, $characterId);
    }

    $this->characters = $characters;
  }
}
