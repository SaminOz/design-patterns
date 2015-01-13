<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strategy extends CI_Controller {
	private $_pattern = 'strategy/';
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->library($this->_pattern . 'mallardduck');
		$duck = new MallardDuck();
		$duck->setQuackBehavior( 'squeak');
		$duck->setFlyBehavior('flyRocketPowered');

		$data['php_output'] = $duck;
		$data['js_output'] = $this->load->view('js/' . $this->_pattern . 'duck.js', $data, TRUE);
		$this->load->view(substr($this->_pattern, 0, (strlen($this->_pattern) - 1)), $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/strategy.php */