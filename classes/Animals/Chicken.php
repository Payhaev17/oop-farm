<?php

// Курица
class Chicken extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;
		$this->product = "Egg";
		$this->min = 0;
		$this->max = 1;
	}
}