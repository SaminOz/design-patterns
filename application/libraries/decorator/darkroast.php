<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Beverage'))
  require_once(LIBPATH . 'abstract/decorator/beverage.php');

class DarkRoast extends Beverage {

  private $cost = .99;

  public function __construct()
  {
    $this->description = 'Dark Roast';
  }

  public function cost()
  {
    return $this->cost;
  }
}