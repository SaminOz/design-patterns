<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('CondimentDecorator'))
  require_once(LIBPATH . 'abstract/decorator/condimentdecorator.php');

class Whip extends CondimentDecorator {
  private $cost = .10;
  private $name = 'Whip';

  public $beverage = NULL;

  public function __construct( Beverage $beverage )
  {
    $this->beverage = $beverage;
  }

  public function getDescription()
  {
    return $this->beverage->getDescription() . '*' . $this->name;
  }

  public function cost()
  {
    return $this->cost + $this->beverage->cost();
  }
}