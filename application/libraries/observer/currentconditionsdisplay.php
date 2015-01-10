<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  if( ! interface_exists('observer'))
    require_once(LIBPATH . 'interfaces/observer/observer.php');

  if( ! interface_exists('displayElement'))
    require_once(LIBPATH . 'interfaces/observer/displayelement.php');

class CurrentConditionsDisplay implements iObserver, iDisplayElement {

  private $temperature = 0;
  private $humidity = 0;
  private $_weatherData;

  public function __construct( WeatherData $wd )
  {
    $this->_weatherData = $wd;
    $this->_weatherData->registerObserver( $this );
  }

  public function update()
  {
    $this->temperature = $this->_weatherData->getTemperature();
    $this->humidity = $this->_weatherData->getHumidity();
    return $this->display();
  }

  public function display()
  {
    return 'Current conditions: ' . $this->temperature . 'F degrees and ' . $this->humidity . '% humidity';
  }

}