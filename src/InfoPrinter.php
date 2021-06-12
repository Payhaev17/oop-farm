<?php

namespace App;

class InfoPrinter {
  static function printMessage($text, $sleepSeconds) {
    echo $text ."\n";
    if ($sleepSeconds) {
      sleep($sleepSeconds);
    }
  }

  static function productsInfo($products) {
    foreach($products as $product) {
      echo "Продукт: ". $product["object"]->name ." \n\t Собрано - ". $product["quantity"] ." ". $product["object"]->unit ."\n";
    }
  }
}