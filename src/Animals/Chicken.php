<?php

namespace App\Animals;

// Курица
class Chicken extends Animal {
	public function __construct() {
		$this->productName = "Egg";
		$this->min = 0;
		$this->max = 1;
	}
}