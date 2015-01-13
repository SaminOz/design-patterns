<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Beverage'))
  require_once(LIBPATH . 'abstract/decorator/beverage.php');

class HouseBlend extends Beverage {

  private $cost = .89;

  public function __construct()
  {
    $this->description = 'House Blend Coffee';
  }

  public function cost()
  {
    return $this->cost;
  }
}