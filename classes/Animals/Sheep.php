<?php

  class Sheep extends Animal {
    public function __construct($uniqueNumber) {
      $this->uniqueNumber = $uniqueNumber;
      $this->product = "Wool";
      $this->min = 1;
      $this->max = 4;
    }
  }