<?php

namespace App;

require_once __DIR__."/vendor/autoload.php";

// Если требуется новое животное, то нужно добавить в массив новый элемент с названием класса и количеством животного
$Farm = new Farm([
  ["className" => "Cow", "quantity" => 10],
  ["className" => "Chicken", "quantity" => 20],
]);

// Можно и так (Название класса, количество)
$Farm->addAnimal("Sheep", 15);

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter\InfoPrinter::productsInfo($Farm->getProductsStorage());
