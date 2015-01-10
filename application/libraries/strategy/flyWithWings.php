<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! interface_exists('iFlyBehavior'))
    require_once(LIBPATH . 'interfaces/strategy/flyBehavior.php');

class FlyWithWings implements iFlyBehavior 
{
    public function fly()
    {
      return 'This duck is flying with wings!';
    }
}