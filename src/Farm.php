<?php

namespace App;

class Farm {
	private array $barn;
	private array $productsStorage;
	
	private int $lastUniqueNumber;

	public function __construct() {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = []; // Хранилище продуктов

		$this->lastUniqueNumber = 0; // Последний уникальный номер животного
	}

	public function addAnimal(Animals\Animal $instance, int $quantity = 1) {
		$instance->changeUniqueNumber( ++$this->lastUniqueNumber );
		// Добавляем его в массив (хлев), где ключем будет имя класса животного, а кол-во будет в соседней ячейке на одном уровне
		$this->barn[ get_class($instance) ]["instance"] = $instance;
		$this->barn[ get_class($instance) ]["quantity"] = $quantity;
	}

	public function addProduct(Products\Product $instance, int $quantity = 0) {
		$product = get_class($instance); // Имя класса

		// Если в хранилище уже есть данный продукт
		if (isset($this->productsStorage[ $product ])) {
			// То к количеству продукта, прибавим количество полученного продукта
			$this->productsStorage[ $product ]["quantity"] += $quantity;
		} else {
			// Если нет, то добавляем предмет в хранилище
			$this->productsStorage[ $product ]["instance"] = $instance;
			$this->productsStorage[ $product ]["quantity"] = $quantity;
		}
	}

	public function collectProducts() {
		InfoPrinter::printMessage("Производится сбор продукции...", 1);
		
		foreach($this->barn as $animal)
		{
			$productClassName = "App\Products\\". $animal["instance"]->getProductName();
			
			// Это новый продукт от животного, пока что его количество равно 0
			$newProduct = [
				"instance" => new $productClassName(),
				"quantity" => 0
			];

			// Если в массиве будет допустим quantity = 10, то данный цикл будет генерировать продукт 10 раз, т.е. для каждого животного
			for($i = 0; $i < $animal["quantity"]; $i++) {
				$newProduct["quantity"] += $animal["instance"]->genProduct();
			}
			
			$this->addProduct($newProduct["instance"], $newProduct["quantity"]);
		}
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}
}