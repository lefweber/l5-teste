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

  public function __construct(array $data)
  {
    $this->title = $data['title'] ?? null;

    $this->synopsis = $data['opening_crawl'] ?? null;

    $this->short_synopsis = $this->getShortSynopsis($this->synopsis);

    $this->slug = strtolower(str_replace(' ', '-', $this->title));

    $this->image_url = '/img/' . $this->slug  . '_large.jpg';

    $this->small_image_url = '/img/' . $this->slug  . '_small.jpg';

    $this->id_external = $data['uid'];

    $this->director = $data['director'];

    $this->producer = $data['producer'];

    $this->episode_id = $data['episode_id'];

    $this->release_date = date("d/m/Y", strtotime($data['release_date']));

    $this->age = $this->getAge($data['release_date']);
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

  private function getShortSynopsis($synopsis, $wordLimit = 16)
  {
      $words = explode(' ', $synopsis);

      $words = array_slice($words, 0, $wordLimit);

      return implode(' ', $words) . (count($words) >= $wordLimit ? '...' : '');
  }
}
