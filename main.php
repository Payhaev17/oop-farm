<?php

namespace App;

require_once __DIR__ ."/vendor/autoload.php";

// Если требуется новое животное, то нужно добавить в массив новый элемент с названием класса и количеством животного
$Shop = new Shop();
$Farm = new Farm();

$Farm->addAnimal($Shop->buyAnimal("Cow"), 10);
$Farm->addAnimal($Shop->buyAnimal("Chicken"), 20);
$Farm->addAnimal($Shop->buyAnimal("Sheep"), 5);

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter::productsInfo( $Farm->getProductsInfo() );