<?php

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($animals = []) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = [];

		$lastUniqueNum = 0;

		foreach($animals as $animal) {
			for($i = 0; $i < $animal["quantity"]; $i++) {
				$newUniqueNum = $this->genUniqueNumber($lastUniqueNum);
				$lastUniqueNum = $newUniqueNum;

				$this->addAnimal($animal["animalType"], $newUniqueNum);
			}
		}
	}

	public function genUniqueNumber($lastUniqueNum) {
		return ++$lastUniqueNum;
	}

	public function getBarn() {
		return $this->barn;
	}

	public function getProductsStorage() {
		return $this->productsStorage;
	}

	public function addAnimal($type, $newUniqueNum) {
		array_push($this->barn, new $type( $newUniqueNum ));
	}

	public function collectProducts() {
		InfoPrinter::printMessage("Производится сбор продукции...", 1);

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