<?php

require_once __DIR__ ."/vendor/autoload.php";

$Shop = new App\Shop();
$Farm = new App\Farm();

$Farm->addAnimal($Shop->buyAnimal("Cow"), 10);
$Farm->addAnimal($Shop->buyAnimal("Chicken"), 20);
$Farm->addAnimal($Shop->buyAnimal("Sheep"), 10);

$Farm->collectProducts();

App\InfoPrinter::productsInfo( $Farm->getProductsInfo() );