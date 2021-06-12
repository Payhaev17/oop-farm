<?php

namespace App;

require_once __DIR__."/vendor/autoload.php";

// Если требуется новое животное, то нужно добавить в массив новый элемент с названием класса и количеством животного
$Farm = new Farm();

// Можно и так (Название класса, количество)
$Farm->addAnimal(new Animals\Cow(), 20);
$Farm->addAnimal(new Animals\Chicken(), 10);
$Farm->addAnimal(new Animals\Sheep(), 15);

// Собираем продукты
$Farm->collectProducts();

// Выводим полученные продукты
InfoPrinter::productsInfo($Farm->getProductsStorage());