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

	function contact() {
		$this->layout->view('contact');
	}

	function team() {
		$this->layout->view('team');
	}

	function training() {
		$this->layout->view('training');
	}

	function products() {
		//$this->layout->view('products');
		if ($_GET['vista'] == 'category') {
			$this->layout->view('product_default');
		}
		else {
			if ($_GET['vista'] == 'application') {
				$this->layout->view('product_default');
			}
			else {
				$query = $this->db->get('marcas');
				$data = array (
					'result' => $query->result()
				);
				$this->layout->view('brands', $data);
			}
		}
	}

	function about() {
		$this->layout->view('about');
	}


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
