<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('Pizza'))
  require_once( LIBPATH . 'abstract/factory/pizza.php');

class ChicagoStyleCheesePizza extends Pizza  {

  public $name = 'Chicago Style Sauce and Cheese';

  public function cut()
  {
    return 'Always cut a ' . $this->name . ' Pizza into square slices';
  }
}

