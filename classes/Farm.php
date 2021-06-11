<?php

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($animals = []) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNum = 0; // Последний уникальный номер животного

		foreach($animals as $animal) {
			$this->addAnimal($animal["className"], $animal["quantity"]);
		}
	}

	public function addAnimal($className, $quantity = 1) {
		if (!class_exists($className)) {
			InfoPrinter::printMessage("Не найден класс животного '". $className ."' ", 1);
			exit();
		}

		// Добавляем его в массив (хлев), где ключем будет имя класса животного, а кол-во будет в соседней ячейке на одном уровне
		$this->barn[ $className ]["object"]   = new $className(++$this->lastUniqueNum);
		$this->barn[ $className ]["quantity"] = $quantity;
	}

	public function addProduct($className, $quantity = 0) {
		if (!class_exists($className)) {
			InfoPrinter::printMessage("Не найден класс продукта '". $className ."' ", 1);
			exit();
		}

		// Если в хранилище уже есть данный продукт
		if (isset($this->productsStorage[ $className ])) {
			// То к количеству продукта, прибавим количество полученного продукта
			$this->productsStorage[ $className ]["quantity"] += $quantity;
		} else {
			// Если нет, то добавляем предмет в хранилище
			$this->productsStorage[ $className ]["object"]  = new $className();
			$this->productsStorage[ $className ]["quantity"] = $quantity;
		}
	}

	public function collectProducts() {
		InfoPrinter::printMessage("Производится сбор продукции...", 1);
		
		foreach($this->barn as $animal)
		{
			// Это новый продукт от животного, пока что его количество равно 0
			$newProduct = [
				"className" => $animal["object"]->getProductName(),
				"quantity" => 0
			];

			// Если в массиве будет допустим quantity = 10, то данный цикл будет генерировать продукт 10 раз, т.е. для каждого животного
			for($i = 0; $i < $animal["quantity"]; $i++) {
				$newProduct["quantity"] += $animal["object"]->genProduct();
			}
			
			$this->addProduct($newProduct["className"], $newProduct["quantity"]);
		}
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}
}