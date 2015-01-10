<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! interface_exists('subject'))
    require_once(LIBPATH . 'interfaces/observer/subject.php');

class WeatherData implements Subject {

  private $observers = array();
  public $temperature = 0;
  public $humidity = 0;
  public $pressure = 0;
  private $changed = FALSE;

  public function __construct()
  {

  }

  public function registerObserver( $observer )
  {
    if( ! in_array( $observer, $this->observers ))
      $this->observers[] = $observer;
  }

  public function removeObserver( $observer )
  {
    if( $key = array_search( $observer, $this->observers ))
      unset($this->observers[$key]);
  }

  public function notifyObservers()
  {
    if( $this->changed )
    {
      foreach( $this->observers as $observer )
        $observer->update();

      $this->changed = FALSE;
    }
  }

  public function measurementsChanged()
  {
    $this->setChanged();
    $this->notifyObservers();
  }

  public function setMeasurements( $temperature, $humidity, $pressure )
  {
    $this->temperature = $temperature;
    $this->humidity = $humidity;
    $this->pressure = $pressure;
    $this->measurementsChanged();
  }

  public function setChanged()
  {
    $this->changed = TRUE;
  }

  public function getTemperature()
  {
    return $this->temperature;
  }

  public function getHumidity()
  {
    return $this->humidity;
  }

  public function getPressure()
  {
    return $this->pressure;
  }

}