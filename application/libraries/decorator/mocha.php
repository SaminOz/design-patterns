<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! class_exists('CondimentDecorator'))
  require_once(LIBPATH . 'abstract/decorator/condimentdecorator.php');
/**
 * Notes: 
 * Since Mocha extends beverage (via CondimentDecorator) AND our beverages also
 * extend the abstract class beverage the following happens in sequence: 
 *  - 1. Espresso (or whatever) updates $description
 *  - 2. We wrap the concrete object (Espresso) in, say, two decorators and then...
 *  - 3. we call getDescription()
 *  - 4. getDescription works back up the chain to the abstract class where it
 *       finds that 'unknown beverage' has been changed by the concrete implementation
 *       to 'Espresso' - it returns this... (see diagram)
 *
 * - beverage::description   espresso
 *      |
 *      /
 * - mocha::getDescription   espresso (+ mocha)
 *      |
 *      /
 * - mocha::getDescription   espresso + mocha (+ mocha)
 * 
 */

class Mocha extends CondimentDecorator {
  private $cost = .20;
  public $name = 'Mocha';

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