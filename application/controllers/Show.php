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
		/*$data['tipos'] = $this->product->get_tipos()->result();
		$data['marcas'] = $this->product->get_tipos()->result();*/
		$this->db->select('*');
		$this->db->from('categorias');
		$this->db->where('tipo_id', CATEGORIA);
		$data['categorias'] = $this->db->get()->result();
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

	function about() {
		$this->layout->view('about');
	}

	function getCategorias() {
		$this->db->select('*');
		$this->db->from('tipos');
		$this->db->where('tipos.nombre', 'Categoria');
		$this->db->join('categorias', 'tipos.id = categorias.tipo_id');
		$query = $this->db->get();
		return $query->result();
	}

	function getAplicaciones() {
		$this->db->select('*');
		$this->db->from('tipos');
		$this->db->where('tipos.nombre', 'Aplicacion');
		$this->db->join('categorias', 'tipos.id = categorias.tipo_id');
		$query = $this->db->get();
		return $query->result();
	}

	function products($vista = null, $subcategoria = null) {
		$this->layout->setLayout('layout_products');
		$data['categoria'] = $this->getCategorias();
		//die($this->db->last_query());
		$data['aplicacion'] = $this->getAplicaciones();
		$data['marcas'] = $this->db->get('marcas')->result();

		switch ($vista) {
			case 'categoria':
			$data['result'] = $data['categoria'];
			$data['breadcrumb'] = 'Categoria';
			//$this->layout->view('product_default', $data);
			break;

			case 'aplicacion':
			$data['result'] = $data['aplicacion'];
			$data['breadcrumb'] = 'Aplicación';
			//$this->layout->view('product_default', $data);
			break;

			case 'marcas':
			$data['result'] = $data['marcas'];
			$data['breadcrumb'] = 'Marcas';
			$this->layout->view('brands', $data);
			return;
			break;

			default:
			$data['breadcrumb'] = null;
			$data['result'] = null;
			$this->layout->view('product_default', $data);
			return;
			break;
		}

		if (!$subcategoria) {
			$this->layout->view('product_default', $data);

		}
		else {
			$data['url'] = $subcategoria;

			$this->db->select('marcas.id, marcas.nombre, marcas.imagen, tipos.nombre tipo');
			$this->db->where('categorias.url', $subcategoria);
			$this->db->from('categorias');
			$this->db->join('tipos', 'tipos.id = categorias.tipo_id');
			$this->db->join('productos_categorias', 'productos_categorias.categoria_id = categorias.id');
			$this->db->join('productos', 'productos.id = productos_categorias.producto_id');
			$this->db->join('marcas', 'marcas.id = productos.marca_id');
			$this->db->distinct();
			$query = $this->db->get();
			$data['marcasSubcategoria'] = $query->result();
			$this->layout->view('product_detail', $data);

			/*switch ($vista) {
				case 'categorias':
				$this->db->select('marcas.id, marcas.nombre, marcas.imagen');
				$this->db->where($tabla.'.url', $subcategoria);
				$this->db->from($tabla);
				$this->db->join('productos', 'productos.'.$tabla.' = '.$tabla.'.id');
				$this->db->join('marcas', 'marcas.id = productos.marca');
				$this->db->distinct();
				$query = $this->db->get();
				$data['marcasSubcategoria'] = $query->result();
				$this->layout->view('product_detail', $data);
				break;

				case 'aplicaciones':
				$this->db->select('marcas.id, marcas.nombre, marcas.imagen');
				$this->db->where($tabla.'.url', $subcategoria);
				$this->db->from($tabla);
				$this->db->join('pindustria', 'pindustria.idindustria = '.$tabla.'.id');
				$this->db->join('productos', 'productos.id = pindustria.idproducto');
				$this->db->join('marcas', 'marcas.id = productos.marca');
				$this->db->distinct();
				$query = $this->db->get();
				$data['marcasSubcategoria'] = $query->result();
				$this->layout->view('product_detail', $data);
				break;
			}*/

		}
	}

	function getProducts($vista, $subcategoria, $marca) {
		$this->db->select('marcas.nombre marca, marcas.imagen, productos.id, productos.nombre, productos.file_pdf, productos.descripcion, productos.file_img');
		$this->db->where('categorias.url', $subcategoria);
		$this->db->where('marcas.id', $marca);
		$this->db->from('categorias');
		$this->db->join('productos_categorias', 'productos_categorias.categoria_id = categorias.id');
		$this->db->join('productos', 'productos.id = productos_categorias.producto_id');
		$this->db->join('marcas', 'marcas.id = productos.marca_id');
		$query = $this->db->get();
		//die($this->db->last_query());
		$data['productos'] = $query->result();
		$jsonstring = json_encode($data);
		echo $jsonstring;
	}

	function getProduct($productId) {
		$product = $this->product->get_product($productId);
		$jsonstring = json_encode($product);
		echo $jsonstring;
	}

	function traerMarcaPorCategoria(){
		/*$categoria_id = $this->input->post('categoria_id');
		$this->db->select('m.nombre');
		$this->db->from('productos_categorias pc');
		$this->db->where('pc.categoria_id', $categoria_id);
		$this->db->join('productos p', 'pc.producto_id = p.id');
		$this->db->join('marcas m', 'p.marca = m.id');*/
		$categoria_id = $this->input->post('categoria_id');
		$this->db->distinct();
		$this->db->select('m.nombre, c.nombre as codigo');
		$this->db->from('marcas m');
		$this->db->join('productos p', 'm.id = p.marca_id', 'LEFT');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id' ,'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$this->db->where('pc.categoria_id', $categoria_id);
		$data = $this->db->get()->result();

		if($data){
			$json = json_encode($data);
			echo $json;
		}else{
			echo 'error';
		}


	}
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
