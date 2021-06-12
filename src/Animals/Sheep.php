<?php

namespace App\Animals;

class Sheep extends Animal {
  public function __construct() {
    $this->productName = "Wool";
    $this->min = 1;
    $this->max = 4;
  }
}