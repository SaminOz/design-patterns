<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Beverage'))
  require_once(LIBPATH . 'abstract/decorator/beverage.php');

abstract class CondimentDecorator extends Beverage {

  public function getDescription()
  {
    return $this->description;
  }

}