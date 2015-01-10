<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Observer extends CI_Controller {
	private $_pattern = 'observer/';
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->library($this->_pattern . 'weatherdata');
		$this->load->helper('form');
		
	  if( ! class_exists('CurrentConditionsDisplay'))
  		require_once(LIBPATH . $this->_pattern . 'currentconditionsdisplay.php');

	  if( ! class_exists('StatisticsDisplay'))
			require_once(LIBPATH . $this->_pattern . 'statisticsdisplay.php');

		if( ! class_exists('ForecastDisplay'))
			require_once(LIBPATH . $this->_pattern . 'forecastdisplay.php');

		/**
		 * make a keyed array that can randomly update one or thuther of the observers.
		 */

  	$wd = new WeatherData;
  	$ccd = new CurrentConditionsDisplay( $wd );
  	$statistics = new StatisticsDisplay( $wd );
  	$forecast = new ForecastDisplay( $wd );
  	$humidity = ( $this->input->post('data')) ? (float) $this->input->post('data') : '68.5';
  	$wd->setMeasurements(1.8, $humidity, 30.4);

		$data['php_output'] = array('wd' => $wd, 'ccd' => $ccd, 'statistics' => $statistics, 'forecast' => $forecast);
		$data['js_output'] = $this->load->view('js/' . $this->_pattern . 'observer.js', $data, TRUE);
		$this->load->view(substr($this->_pattern, 0, (strlen($this->_pattern) - 1)), $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */