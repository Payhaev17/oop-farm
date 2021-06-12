<?php

namespace App;

class Shop {
  private array $animals;

  public function __construct()
  {
    $this->animals = [
      "Cow" => function() {
        return new Animals\Cow();
      },
      "Chicken" => function() {
        return new Animals\Chicken();
      },
      "Sheep" => function() {
        return new Animals\Sheep();
      }
    ];
  }

  public function buyAnimal(string $animalName = "Cow") :Animals\Animal {
    if (isset($this->animals[ $animalName ])) {
      return $this->animals[ $animalName ]();
    }
  }
}