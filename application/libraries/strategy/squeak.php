<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! interface_exists('iQuackBehavior'))
    require_once(LIBPATH . 'interfaces/strategy/quackBehavior.php');

class Squeak implements iQuackBehavior 
{
    public function quack()
    {
      return 'This duck squeaks!';
    }
}