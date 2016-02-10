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

	function products($vista = null, $subcategoria = null) {
		$this->layout->setLayout('layout_products');
		$data['categorias'] = $this->db->get('tipo')->result();
		$data['aplicaciones'] = $this->db->get('industria')->result();
		$data['marcas'] = $this->db->get('marcas')->result();

		switch ($vista) {
			case 'categorias':
			$data['result'] = $this->db->get('tipo')->result();
			$data['breadcrumb'] = "Categorías";
			$tabla = 'tipo';
			//$this->layout->view('product_default', $data);
			break;

			case 'aplicaciones':
			$data['result'] = $this->db->get('industria')->result();
			$data['breadcrumb'] = "Aplicaciones";
			$tabla = 'industria';
			//$this->layout->view('product_default', $data);
			break;

			case 'marcas':
			$data['result'] = $this->db->get('marcas')->result();
			$data['breadcrumb'] = "Marcas";
			$this->layout->view('brands', $data);
			return;
			break;

			default:
			$data['breadcrumb'] = null;
			$data['result'] = [];
			$this->layout->view('product_default', $data);
			return;
			break;
		}

		if (!$subcategoria) {
			$this->layout->view('product_default', $data);
		}
		else {
			$data['url'] = $subcategoria;
			$this->db->select('marcas.id, marcas.nombre, marcas.imagen');
			$this->db->where('url', $subcategoria);
			$this->db->from($tabla);
			$this->db->join('productos', 'productos.tipo = '.$tabla.'.id');
			$this->db->join('marcas', 'marcas.id = productos.marca');
			$this->db->distinct();
			$query = $this->db->get();
			$data['marcasSubcategoria'] = $query->result();
			$this->layout->view('product_detail', $data);
		}
	}

	function about() {
		$this->layout->view('about');
	}


}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
