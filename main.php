<?php

require "./classes/InfoPrinter.php";

require "./classes/Animal.php";
require "./classes/Animals/Cow.php";
require "./classes/Animals/Chicken.php";
require "./classes/Animals/Sheep.php";

require "./classes/Product.php";
require "./classes/Products/Milk.php";
require "./classes/Products/Egg.php";
require "./classes/Products/Wool.php";

require "./classes/Farm.php";

// Если требуется новое животное, то нужно добавить в массив новый элемент с названием класса и количеством животного
$Farm = new Farm([
  ["className" => "Cow", "quantity" => 10],
  ["className" => "Chicken", "quantity" => 20],
]);

// $Farm->addAnimal("Sheep", 15); // Можно и так

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter::productInfo($Farm->getProductsStorage());
