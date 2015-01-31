<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class Pizza {
  public $name;
  public $dough;
  public $sauce;
  public $toppings = array();

  public function prepare()
  {
    return 'who am I? I\'m a ' . $this->name . ' Pizza';
  }

  public function bake()
  {
     return $this->name . ' pizza\'s need to be baked for around 20 mins on high';
  }

  public function cut()
  {
    return 'Always cut a ' . $this->name . ' Pizza into diagonal slices';
  }

  public function box()
  {
    return 'Boxes for all Pizzas world-wide are the same - so just box me!';
  }
}