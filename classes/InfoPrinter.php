<?php

class InfoPrinter {
  static function printMessage($text, $sleepSeconds) {
    echo $text ."\n";
    sleep($sleepSeconds);
  }

  static function productInfo($products) {
    foreach($products as $product) {
      echo $product["product"]->name ." | Собрано - ". $product["quantity"] ." ". $product["product"]->unit ."\n";
    }
  }

}