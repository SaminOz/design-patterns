<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('CondimentDecorator'))
  require_once(LIBPATH . 'abstract/decorator/condimentdecorator.php');

class Soy extends CondimentDecorator {
  private $cost = .15;
  private $name = 'Soy';

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