<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('Pizza'))
  require_once( LIBPATH . 'abstract/factory/pizza.php');

class NYStyleCheesePizza extends Pizza  {

  public $name = 'NY Style Sauce and Cheese';

}