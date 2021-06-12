<?php

namespace App;

class Farm {
	private array $barn;
	private array $productsStorage;
	
	private int $lastUniqueNumber;

	public function __construct() {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNumber = 1; // Последний уникальный номер животного
	}

	public function addAnimal(Animals\Animal $instance, int $quantity = 1) { // В аргументы получаем только наследник от класса Animal
		// Добавляем отдельно каждое животное
		for($i = 0; $i < $quantity; $i++) {
			$newUniqueNumber = ++$this->lastUniqueNumber;
			$this->lastUniqueNumber = $newUniqueNumber;

			$instance->changeUniqueNumber( $newUniqueNumber );
			array_push($this->barn, $instance);
		}
	}

	public function addProduct(Products\Product $instance) { // В аргументы получаем только наследник от класса Product
		array_push($this->productsStorage, $instance);
	}

	public function collectProducts() {
		if (count($this->barn) <= 0) {
			exit(InfoPrinter::printMessage("Хлев пуст", 1));
		}

		InfoPrinter::printMessage("Производится сбор продукции...", 1);
		
		foreach($this->barn as $animal) {
			$productClassName = "App\Products\\". $animal->getProductName();
			$productQuantity = $animal->genProduct();
			
			// Это новый продукт от животного, пока что его количество равно 0
			for($i = 0; $i < $productQuantity; $i++) {
				$this->addProduct(new $productClassName());
			}
		}
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsInfo() :array {
		$info = [];

		foreach($this->productsStorage as $product) {
			$productName = get_class($product);

			if (isset($info[ $productName ])) {
				$info[ $productName ]["quantity"] += 1;
			} else {
				$info[ $productName ]["instance"] = $product;
				$info[ $productName ]["quantity"] = 1;
			}
		}

		return $info;
	}
}