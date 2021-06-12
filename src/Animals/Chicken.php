<?php

// Курица
class Chicken extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;
		$this->productName = "Egg";
		$this->min = 0;
		$this->max = 1;
	}
}