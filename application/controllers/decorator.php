<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decorator extends CI_Controller {
  private $_pattern = 'decorator/';
  public function __construct(){
    parent::__construct();
  }

  public function index()
  {
    $permitted = array(
      'espresso',
      'house blend',
      'dark roast',
      'decaf'
    );

    $selected = 'espresso';
    if( $this->input->post('data'))
    {
      if( ! in_array(strtolower($this->input->post('data')), $permitted))
        return FALSE;

      $selected = str_replace(' ', '', strtolower($this->input->post('data')));
    }
  
    $this->load->library($this->_pattern . $selected);
    $this->load->helper('form');
    //Espresso, House Blend, Dark Roast or Decaf
    $beverage = new $selected();
    //Condiments: Mocha, Whip, SteamedMilk, Soy
    if( ! class_exists('Mocha'))
      require_once(LIBPATH . 'decorator/mocha.php');
    if( ! class_exists('Whip'))
      require_once(LIBPATH . 'decorator/whip.php');
    if( ! class_exists('SteamedMilk'))
      require_once(LIBPATH . 'decorator/steamedmilk.php');
    if( ! class_exists('Soy'))
      require_once(LIBPATH . 'decorator/soy.php');
    $beverage = new Mocha( $beverage );
    $beverage = new Mocha( $beverage );
    $beverage = new Soy( $beverage );
    $beverage = new SteamedMilk( $beverage );
    $beverage = new Whip( $beverage );

    $data['php_output'] = array('beverage' => $beverage);
    $data['js_output'] = '';//$this->load->view('js/' . $this->_pattern . 'observer.js', $data, TRUE);
    $this->load->view(substr($this->_pattern, 0, (strlen($this->_pattern) - 1)), $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/decorator.php */