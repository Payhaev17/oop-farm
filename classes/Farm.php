<?php

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($animals = []) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNum = 0;

		foreach($animals as $animal) {
			for($i = 0; $i < $animal["quantity"]; $i++) {
				$this->addAnimal($animal["animalType"]);
			}
		}
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}

	public function addAnimal($animalClass) {
		// Если класс животного существует
		if (class_exists($animalClass)) {
			// Добавляем его в массив (хлев)
			array_push($this->barn, new $animalClass( ++$this->lastUniqueNum ));
		} else {
			InfoPrinter::printMessage("Не найден класс данного животного", 1);
			exit();
		}
	}

	public function addProduct($productClass, $quantity = 0) {
		// Если класс продукта существует
		if (class_exists($productClass)) {
			// Добавляем его в массив
			$this->productsStorage[ $productClass ]["product"] = new $productClass();
			$this->productsStorage[ $productClass ]["quantity"] = $quantity;
		} else {
			InfoPrinter::printMessage("Не найден класс данного продукта", 1);
			exit();
		}
	}

	public function collectProducts() {
		InfoPrinter::printMessage("Производится сбор продукции...", 1);

		foreach($this->barn as $animal) {
			$newProductInfo = $animal->genProduct();

			// Если в хранилище уже есть данный продукт
			if (isset($this->productsStorage[ $newProductInfo["class"] ])) {
				// То к количеству продукта из хранилища, прибавим количество полученного продукта
				$this->productsStorage[ $newProductInfo["class"] ]["quantity"] += $newProductInfo["quantity"];
			} else {
				// Если нет, то добавляем предмет в хранилище
				$this->addProduct($newProductInfo["class"], $newProductInfo["quantity"]);
			}
		}
	}
}