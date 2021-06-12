<?php

namespace App\Products;

class Wool extends Product {
  public function __construct() {
    $this->name = "Шерсть";
    $this->unit = "кг.";
  }
}