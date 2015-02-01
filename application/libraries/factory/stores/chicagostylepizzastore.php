<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('PizzaStore'))
  require_once( LIBPATH . 'abstract/factory/pizzastore.php');

$files = realpath(dirname('.')) . '/application/libraries/factory/pizzas';

foreach (new DirectoryIterator($files) as $fileInfo) {
  if($fileInfo->isDot()) continue;
  if(!class_exists($fileInfo->getBasename('.php')))
    require_once( LIBPATH . 'factory/pizzas/' . $fileInfo->getBasename());
}


class ChicagoStylePizzaStore extends PizzaStore {

  public function createPizza( $type )
  {
    return new $type();
  }

}