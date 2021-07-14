<?php

namespace App;

class Farm {
	private array $barn;
	private array $productsStorage;
	
	private int $lastUniqueNumber;

	public function __construct() {
		$this->barn = []; // Хлев
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNumber = 1; // Последний уникальный номер животного
	}

	public function addAnimal(Animals\Animal $instance, int $quantity) { // В аргументы получаем только наследника от класса Animal
		// Добавляем отдельно каждое животное
		for($i = 0; $i < $quantity; $i++) {
			$newUniqueNumber = ++$this->lastUniqueNumber;

			$instance->changeUniqueNumber( $newUniqueNumber );
			array_push($this->barn, $instance);
		}
	}

	public function addProduct(Products\Product $instance) { // В аргументы получаем только наследника от класса Product
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
			
			for($i = 0; $i < $productQuantity; $i++) {
				$this->addProduct(new $productClassName());
			}
		}
	}

	public function getBarn() :array {
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