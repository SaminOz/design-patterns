<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factory extends CI_Controller {
  private $_pattern = 'factory/';

  public function __construct(){
    parent::__construct();
  }

  public function index()
  {
    $path = 'nystylepizzastore'; //default
    $choice = 'nystylecheesepizza'; //default

    $files = realpath(dirname('.')) . '/application/libraries/' . $this->_pattern . 'pizzas';
    $data['pizzas'] = array();
    //create dropdown menu
    foreach (new DirectoryIterator($files) as $fileInfo) {
      if($fileInfo->isDot()) continue;
        $data['pizzas'][$fileInfo->getBasename('.php')] = $fileInfo->getBasename('.php');
    }

    if( $this->input->post()) {
      $choice = $data['pizzas'][$_POST['data']];
      $path = (strpos($_POST['data'], 'chicago') !== FALSE) ? 'chicagostylepizzastore' : 'nystylepizzastore';
    }

    $this->load->library($this->_pattern . 'stores/' . $path);

    $data['storeJs'] = $path;

    $this->load->helper('form');
    //example: new NYStylePizzaStore
    $pizzastore = new $path();
    $data['explanation'] = $pizzastore->orderPizza($choice);

    $data['php_output'] = array('pizzastore' => $pizzastore, 'pizza' => $choice);
    $data['js_output'] = $this->load->view('js/' . $this->_pattern . 'factory.js', $data, TRUE);
    $this->load->view(substr($this->_pattern, 0, (strlen($this->_pattern) - 1)), $data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/decorator.php */