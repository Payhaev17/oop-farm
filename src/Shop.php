<?php

namespace App;

class Shop {
  private array $animals;

  public function __construct()
  {
    $this->animals = [
      "Cow" => new Animals\Cow(),
      "Chicken" => new Animals\Chicken(),
      "Sheep" => new Animals\Sheep()
    ];
  }

  public function buyAnimal(string $animalName = "Cow") {
    if (isset($this->animals[ $animalName ])) {
      return $this->animals[ $animalName ];
    }
  }
}