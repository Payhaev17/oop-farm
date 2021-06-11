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
  ["animal" => "Cow", "quantity" => 10],
  ["animal" => "Chicken", "quantity" => 20],
]);

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter::productInfo($Farm->getProductsStorage());
