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
		$data['tipos'] = $this->product->get_tipos()->result();
		$data['marcas'] = $this->product->get_tipos()->result();

		$this->load->view('site/home', $data);
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

	function products($vista = null) {
		$this->layout->setLayout('layout_products');
		$data['categorias'] = $this->db->get('tipo')->result();
		$data['aplicaciones'] = $this->db->get('industria')->result();
		$data['marcas'] = $this->db->get('marcas')->result();
		//$this->layout->view('products');
		// if ($vista == 'categoria') {
		// 	$data['result'] = $this->db->get('tipo')->result();
		// 	$data['breadcrumb'] = "Categoría";
		// 	$this->layout->view('product_default', $data);
		// }
		// else {
		// 	if ($vista == 'aplicacion') {
		// 		$data['result'] = $this->db->get('industria')->result();
		// 		$data['breadcrumb'] = "Aplicación";
		// 		$this->layout->view('product_default', $data);
		// 	}
		// 	else {
		// 		$query = $this->db->get('marcas');
		// 		$data['result'] = $query->result();
		// 		$data['breadcrumb'] = "Marcas";
		// 		$this->layout->view('brands', $data);
		// 	}
		// }

		switch ($vista) {
			case 'categoria':
				$data['result'] = $this->db->get('tipo')->result();
				$data['breadcrumb'] = "Categoría";
				$this->layout->view('product_default', $data);
				break;

			case 'aplicacion':
				$data['result'] = $this->db->get('industria')->result();
				$data['breadcrumb'] = "Aplicación";
				$this->layout->view('product_default', $data);
				break;

			case 'marcas':
				$data['result'] = $this->db->get('marcas')->result();
				$data['breadcrumb'] = "Marcas";
				$this->layout->view('brands', $data);
				break;

			default:
				$data['breadcrumb'] = null;
				$data['result'] = [];
				$this->layout->view('product_default', $data);
				break;
		}
	}

	function about() {
		$this->layout->view('about');
	}


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
