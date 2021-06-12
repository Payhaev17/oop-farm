<?php

namespace App;

abstract class Animal {
	// Уникальный номер каждого животного
	protected $uniqueNumber;
	// Название генерируемого продукта
	protected $productName;
	// Минимальное кол-во продукта
	protected $min;
	// Максимальное кол-во продукта
	protected $max;

	public function getUniqueNumber() {
		return $this->uniqueNumber;
	}

	public function genProduct() {
		return mt_rand($this->min, $this->max);
	}

	public function getProductName() {
		return $this->productName;
	}
};