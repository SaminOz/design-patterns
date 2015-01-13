<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Beverage'))
  require_once(LIBPATH . 'abstract/decorator/beverage.php');

class Decaf extends Beverage {

  private $cost = 1.05;

  public function __construct()
  {
    $this->description = 'Decaf';
  }

  public function cost()
  {
    return $this->cost;
  }
}