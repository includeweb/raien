<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->load->model('Product_Model','product');
		$this->layout->setLayout('layout_site');
		$this->layout->setFolder('site');
	}

	function index(){
		$this->load->view('site/home');
	}

	function engineering() {
		$this->layout->view('engineering');
	}

}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */