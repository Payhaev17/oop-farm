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

// Корова
class Cow extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;

		$this->productType = "milk";

		$this->min = 8;
		$this->max = 12;
	}
}

// Курица
class Chicken extends Animal {
	public function __construct($uniqueNumber) {
		$this->uniqueNumber = $uniqueNumber;

		$this->productType = "egg";

		$this->min = 0;
		$this->max = 1;
	}
}

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($cowLength = 10, $chickenLength = 20) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = [];

		for($i = 0; $i < $cowLength; $i++) {
			array_push($this->barn, new Cow($this->genUniqueNumber()));
		}

		for($i = 0; $i < $chickenLength; $i++) {
			array_push($this->barn, new Chicken($this->genUniqueNumber()));
		}
	}

	public function genUniqueNumber() {
		$length = count($this->barn);

		if ($length <= 0) return 0;
		else return $this->barn[ $length-1 ]->getUniqueNumber() + 1;
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}

	public function collectProducts() {
		foreach($this->barn as $animal) {
			$product = $animal->genProduct();

			// Если в хранилище уже есть продукт данного типа
			if (isset($this->productsStorage[ $product["type"] ])) {
				// То к количеству продукта из хранилища, прибавим количество полученного продукта
				$this->productsStorage[ $product["type"] ] += $product["quantity"];
			} else {
				// Если нет, то создаем новый предмет в хранилище, и сохраняем его количество
				$this->productsStorage[ $product["type"] ] = $product["quantity"];
			}
		}
	}
}

$Farm = new Farm(10, 20);

// $Farm->collectProducts();

// $products = $Farm->getProductsStorage();

// foreach($products as $key => $value) {
// 	echo $key ." - ". $value ."\n";
// }