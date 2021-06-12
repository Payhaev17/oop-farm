<?php

namespace App\Products;

abstract class Product {
  protected $name;
  protected $unit;

  public function getName() {
    return $this->name;
  }

  public function getUnit() {
    return $this->unit;
  }
}