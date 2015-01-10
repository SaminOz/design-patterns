<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('Duck'))
  require_once(LIBPATH . 'strategy/duck.php');

class MallardDuck extends Duck
{
  public function __construct()
  {
    parent::__construct(
     array(
       '_flyBehavior' => 'flyWithWings',
       '_quackBehavior' => 'quack'
     )
    );
  }

}