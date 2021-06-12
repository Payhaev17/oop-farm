<?php

namespace App\Products;

abstract class Product {
  protected $name;
  protected $unit;

  public function getName() :string {
    return $this->name;
  }

  public function getUnit() :string {
    return $this->unit;
  }
}