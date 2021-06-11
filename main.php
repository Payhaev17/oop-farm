<?php

require "./classes/Animal.php";
require "./classes/Cow.php";
require "./classes/Chicken.php";
require "./classes/Farm.php";

$Farm = new Farm(10, 20);

// $Farm->collectProducts();

// $products = $Farm->getProductsStorage();

// foreach($products as $key => $value) {
// 	echo $key ." - ". $value ."\n";
// }