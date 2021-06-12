<?php

namespace App\Animals;

// Корова
class Cow extends Animal {
	public function __construct() {
		$this->productName = "Milk";
		$this->min = 8;
		$this->max = 12;
	}
}