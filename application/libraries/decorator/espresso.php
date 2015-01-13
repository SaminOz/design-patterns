<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Beverage'))
  require_once(LIBPATH . 'abstract/decorator/beverage.php');

class Espresso extends Beverage {

  private $cost = 1.99;

  public function __construct()
  {
    $this->description = 'Espresso';
  }

  public function cost()
  {
    return $this->cost;
  }
}