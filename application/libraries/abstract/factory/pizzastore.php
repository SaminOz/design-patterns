<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class PizzaStore {

  public $pizza;
  public $explanation = array();

  public abstract function createPizza( $type );

  public function orderPizza( $type )
  {
    $this->pizza = $this->createPizza( $type );
    $this->explanation[] = $this->pizza->prepare();
    $this->explanation[] = $this->pizza->bake();
    $this->explanation[] = $this->pizza->cut();
    $this->explanation[] = $this->pizza->box();
    //$explanation is just for secondary PHP output
    return $this->explanation;
  }
}