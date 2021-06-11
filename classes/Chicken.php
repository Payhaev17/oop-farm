<?php

// Курица
class Chicken extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;

		$this->productType = "egg";

		$this->min = 0;
		$this->max = 1;
	}
}