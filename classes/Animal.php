<?php

abstract class Animal {
	// Уникальный номер каждого животного
	protected $uniqueNumber;
	// Генерируемый продукт
	protected $product;
	// Минимальное кол-во продукта
	protected $min;
	// Максимальное кол-во продукта
	protected $max;

	public function getUniqueNumber() {
		return $this->uniqueNumber;
	}

	public function genProduct() {
		return ["class" => $this->product, "quantity" => mt_rand($this->min, $this->max)];
	}
};