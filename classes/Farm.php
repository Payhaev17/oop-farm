<?php

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($animals = []) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNum = 0;

		foreach($animals as $animal) {
			$this->addAnimal($animal["animal"], $animal["quantity"]);
		}
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}

	public function addAnimal($animalClass, $quantity = 1) {
		// Если класс животного существует
		if (class_exists($animalClass)) {
			// Добавляем его в массив (хлев), где ключем будет имя класса животного, а кол-во будет в соседней ячейке на одном уровне
			$this->barn[ $animalClass ]["animal"]   = new $animalClass(++$this->lastUniqueNum);
			$this->barn[ $animalClass ]["quantity"] = $quantity;
		} else {
			InfoPrinter::printMessage("Не найден класс животного '". $animalClass ."' ", 1);
			exit();
		}
	}

	public function addProduct($productClass, $quantity = 0) {
		// Если класс продукта существует
		if (class_exists($productClass)) {
			// Добавляем его в массив, где ключем массива будет имя класса продукта, а кол-во будет в соседней ячейке на одном уровне
			$this->productsStorage[ $productClass ]["product"]  = new $productClass();
			$this->productsStorage[ $productClass ]["quantity"] = $quantity;
		} else {
			InfoPrinter::printMessage("Не найден класс продукта '". $productClass ."' ", 1);
			exit();
		}
	}

	public function collectProducts() {
		InfoPrinter::printMessage("Производится сбор продукции...", 1);
		
		foreach($this->barn as $animalInfo) 
		{
			// Если в массиве будет quantity = 10, тот данный цикл будет генерировать продукт 10 раз, т.е. для каждого животного
			for($i = 0; $i < $animalInfo["quantity"]; $i++) {
				$newProductInfo = $animalInfo["animal"]->genProduct();

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
}