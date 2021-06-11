<?php

class InfoPrinter {
  static $translates = [
    "milk" => "Молока",
    "egg" => "Яиц"
  ];

  static $units = [
    "milk" => "л.",
    "egg" => "шт."
  ];

  static function printMessage($text, $sleepSeconds) {
    echo $text ."\n";
    sleep($sleepSeconds);
  }

  static function productInfo($products) {
    foreach($products as $key => $value) {
      $translate = InfoPrinter::$translates[ $key ];
      $unit = InfoPrinter::$units[ $key ];

      echo $translate ." собрано - ". $value ." ". $unit ."\n";
    }
  }
}