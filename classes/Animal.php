<?php

// Предок животных
abstract class Animal {
	// Уникальный номер каждого животного
	private $uniqueNumber;

	public function getUniqueNumber() {
		return $this->uniqueNumber;
	}

	public function genProduct() {
		return ["type" => $this->productType, "quantity" => mt_rand($this->min, $this->max)];
	}
};