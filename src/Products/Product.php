<?php

namespace App\Products;

abstract class Product {
  protected string $name;
  protected string $unit;

  public function getName() :string {
    return $this->name;
  }

  public function getUnit() :string {
    return $this->unit;
  }
}