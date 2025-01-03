<?php

namespace App\Models;

class Movie
{
  public $title;
  public $synopsis;
  public $short_synopsis;
  public $slug;
  public $small_image_url;
  public $id_external;

  public function __construct(array $data)
  {
    $this->title = $data['title'] ?? null;

    $this->synopsis = $data['opening_crawl'] ?? null;

    $this->short_synopsis = $this->getShortSynopsis($this->synopsis);

    $this->slug = strtolower(str_replace(' ', '-', $this->title));

    $this->small_image_url = 'img/' . $this->slug  . '_small.jpg';

    $this->id_external = $data['episode_id'];
  }

  private function getShortSynopsis($synopsis, $wordLimit = 16)
  {
      $words = explode(' ', $synopsis);

      $words = array_slice($words, 0, $wordLimit);

      return implode(' ', $words) . (count($words) >= $wordLimit ? '...' : '');
  }
}
