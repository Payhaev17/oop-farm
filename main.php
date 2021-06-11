<?php

require "./classes/Animal.php";
require "./classes/Cow.php";
require "./classes/Chicken.php";

require "./classes/InfoPrinter.php";
require "./classes/Farm.php";

// Если требуется новое животное, то добавить в массив новый элемент с названием класса и количеством животного
$Farm = new Farm([
  ["animalType" => "Cow", "quantity" => 10],
  ["animalType" => "Chicken", "quantity" => 20]
]);

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter::productInfo($Farm->getProductsStorage());