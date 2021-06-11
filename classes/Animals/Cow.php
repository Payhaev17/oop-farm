<?php

// Корова
class Cow extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;
		$this->productName = "Milk";
		$this->min = 8;
		$this->max = 12;
	}
}