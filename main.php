<?php

require "./classes/Animal.php";
require "./classes/Cow.php";
require "./classes/Chicken.php";
require "./classes/Farm.php";

// Если требуется добавить животное, то нужно добавить в массив новый массив, с именем класса нового животного, и нужным его количеством
$Farm = new Farm([
  ["animalType" => "Cow", "quantity" => 10],
  ["animalType" => "Chicken", "quantity" => 20]
]);

// $Farm->collectProducts();

// $products = $Farm->getProductsStorage();

// foreach($products as $key => $value) {
//  	echo $key ." - ". $value ."\n";
// }