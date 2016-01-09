<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->load->model('Product_Model','product');
		$this->layout->setLayout('layout_web');
		$this->layout->setFolder('site');
	}

	function index(){
		$this->layout->view('home');
	}

}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */