<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Beverage {
  
  public $description = 'Unknown Beverage';

  public function getDescription()
  {
    return $this->description;
  }

  abstract public function cost();

}