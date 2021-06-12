<?php

namespace App;

class InfoPrinter {
  static function printMessage(string $text, int $sleepSeconds) {
    echo $text ."\n";
    if ($sleepSeconds) {
      sleep($sleepSeconds);
    }
  }

  static function productsInfo(array $products) {
    foreach($products as $product) {
      echo "Продукт: {$product["instance"]->getName()} \n\t Собрано - {$product["quantity"]} {$product["instance"]->getUnit()}\n";
    }
  }
}