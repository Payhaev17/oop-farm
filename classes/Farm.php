<?php

class Farm {
	private $barn;
	private $productsStorage;

	public function __construct($animals = []) {
		$this->barn = []; // Данный массив будет выступать в качестве хлева
		$this->productsStorage = [];

		foreach($animals as $animal) {
			for($i = 0; $i < $animal["quantity"]; $i++) {
				array_push(
					$this->barn, 
					new $animal["animalType"]( $this->genUniqueNumber() )
				);
			}
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