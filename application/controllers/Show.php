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
		$data['active_tab'] = 'ingenieria';
 		$this->layout->view('engineering', $data);
	}

	function contact() {
		$data['active_tab'] = 'contacto';
		$this->layout->view('contact', $data);
	}
	
	function add_contact() {
		if($_POST){
			$insert['nombre'] = $this->input->post('nombre');
			$insert['empresa'] = $this->input->post('empresa');
			$insert['direccion'] = $this->input->post('direccion');
			$insert['ciudad'] = $this->input->post('ciudad');
			$insert['pais'] = $this->input->post('pais');
			$insert['telefono'] = $this->input->post('telefono');
			$insert['email'] = $this->input->post('email');
			$insert['consulta'] = $this->input->post('consulta');
			$this->db->insert('contacts',$insert);
		}
	}

	function team() {
		$data['active_tab'] = 'team';
		$data['insert'] = '';
		if($_POST){

			$insert['nombre'] = $this->input->post("nombre");
			$insert['telefono'] = $this->input->post("telefono");
			$insert['email'] = $this->input->post("email");
			if(!empty($_FILES['myFile']['name'])){
				$folder = DIRECTORY_UPLOAD ."/cv/";
				$filename = rand(0,100000).preg_replace('/\s+/', '',$_FILES['myFile']['name']);
				$file = $folder ."/".$filename;
				if (move_uploaded_file($_FILES['myFile']['tmp_name'], $file)) {
				    $insert['filename'] = $filename;
				    $data['insert'] = 'Muchas gracias por su confianza. Nos contactaremos a la brevedad.';
				    $this->db->insert('teams',$insert);
				}
			}
		}


		$this->layout->view('team',$data);
	}

	function training() {
		$data['active_tab'] = 'capacitacion';
		$this->db->select('*');
		$this->db->from('capacitaciones');
		$this->db->order_by('from','asc');
		$data['capacitaciones'] = $this->db->get()->result();
		$this->layout->view('training', $data);
	}

	function about() {
		$data['active_tab'] = 'institucional';
		$this->layout->view('about', $data);
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

	function products($vista = null, $subcategoria = null, $marca_nombre = null, $producto_url = null) {
		$data['active_tab'] = 'productos';
		/*if(isset($marca_id) && isset($producto_id)){
			$data['producto_id'] = $producto_id;
			$data['marca_id'] = $marca_id;
		} else {
			$data['producto_id'] = 0;
			$data['marca_id'] = 0;
		}*/
		/*echo 'vista '.$vista.'<br>';
		echo 'subcategoria '.$subcategoria.'<br>';*/

		if($marca_nombre != '' && $marca_nombre != null){
			$marca_id = $this->traerMarcaPorNombre($marca_nombre);
			$data['marca_id'] = $marca_id;
		}else{
			$data['marca_id'] = 0;
		}
		if($producto_url != '' && $producto_url != null){
			
			$producto_id = $this->traerProductoPorUrl($producto_url);
			
			$this->db->select('*');
			$this->db->from('productos');
			$this->db->where('id', $producto_id);
			$producto = $this->db->get()->row();
			$data['producto_id'] = $producto_id;
		}else{
			$producto = '';
			$data['producto_id'] = 0;
		}

		

		



		$this->layout->setLayout('layout_products');
		
		$data['categoria'] = $this->getCategorias();
		//die($this->db->last_query());
		$data['aplicacion'] = $this->getAplicaciones();
		$data['marcas'] = $this->db->get('marcas')->result();
		
		
		switch ($vista) {
			case 'categoria':
			$data['result'] = $data['categoria'];
			$data['breadcrumb'] = 'Categoria';
			$data['producto'] = $producto;
			//$this->layout->view('product_default', $data);
			break;

			case 'aplicacion':
			$data['result'] = $data['aplicacion'];
			$data['breadcrumb'] = 'Aplicación';
			$data['producto'] = $producto;
			//$this->layout->view('product_default', $data);
			break;

			case 'marcas':
			$data['result'] = $data['marcas'];
			$data['breadcrumb'] = 'Marcas';
			$data['producto'] = $producto;
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

			$data['producto'] = $producto;
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

	function getProducts($vista = null, $subcategoria, $marca) {
		$this->db->select('productos.copete, marcas.nombre marca, marcas.imagen, marcas.description, productos.url as urlRedirect, productos.id, productos.nombre, productos.file_pdf, productos.descripcion, productos.file_img');
		$this->db->where('categorias.url', $subcategoria);
		$this->db->where('marcas.id', $marca);
		$this->db->from('categorias');
		$this->db->join('productos_categorias', 'productos_categorias.categoria_id = categorias.id');
		$this->db->join('productos', 'productos.id = productos_categorias.producto_id');
		$this->db->join('marcas', 'marcas.id = productos.marca_id');
		$this->db->order_by('productos.sort', 'ASC');
		$query = $this->db->get();
		//die($this->db->last_query());
		$data['productos'] = $query->result();
		$jsonstring = json_encode($data);
		echo $jsonstring;
	}

	/*function getProduct($productId) {
		$product = $this->product->get_product($productId);
		$jsonstring = json_encode($product);
		echo $jsonstring;
	}*/

	function getProduct($productId){
		$this->db->select('p.url as producto_url, p.descripcion, p.nombre, p.file_img, m.nombre as marca_nombre, c.url as categoria, p.file_pdf');
		$this->db->from('productos p');
		$this->db->limit(1);
		$this->db->where('p.id', $productId);
		$this->db->join('marcas m', 'p.marca_id = m.id', 'LEFT');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id', 'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$query = $this->db->get();
		$product = $query->row();
		$data['product'] = $product;

		$this->db->select('*');
		$this->db->from('imagen_productos');
		$this->db->where('producto_id', $productId);
		$query = $this->db->get();
		$photos = $query->result();
		$data['photos'] = $photos;

		$this->db->select('c.descripcion');
		$this->db->from('productos p');
		$this->db->where('p.id', $productId);
		$this->db->where('c.tipo_id', '2');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id', 'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$query = $this->db->get();
		$category = $query->result();
		$data['category'] = $category;

		$jsonstring = json_encode($data);
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
		$this->db->select('m.nombre, c.nombre as codigo, m.id as marca_id, c.url');
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
	function getProductsHome($subcategoria, $marca) {
		$this->db->select('marcas.nombre marca, marcas.imagen, productos.id, productos.nombre');
		$this->db->where('categorias.id', $subcategoria);
		$this->db->where('marcas.id', $marca);
		$this->db->from('categorias');
		$this->db->join('productos_categorias', 'productos_categorias.categoria_id = categorias.id');
		$this->db->join('productos', 'productos.id = productos_categorias.producto_id');
		$this->db->join('marcas', 'marcas.id = productos.marca_id');
		$this->db->order_by('productos.sort', 'ASC');
		$query = $this->db->get();
		//die($this->db->last_query());
		$data = $query->result();
		$jsonstring = json_encode($data);
		echo $jsonstring;
	}

	public function getProductById(){
		$this->db->select('nombre');
		$this->db->from('productos');
		$this->db->where('id', $this->input->post('producto_id'));

		$data = $this->db->get()->row();
		$jsonstring = json_encode($data);
		echo $jsonstring;
	}

	public function traerMarcaPorNombre($marca_nombre){
		$this->db->select('id');
		$this->db->from('marcas');
		$this->db->like('imagen', $marca_nombre);

		$data = $this->db->get()->row();
		
		return $data->id;

	}

	public function traerProductoPorUrl($producto_url){
		$this->db->select('id');
		$this->db->from('productos');
		$this->db->like('url', $producto_url);

		$data = $this->db->get()->row();

		return $data->id;

	}
	function getProductHome($producto){
		$this->db->select('p.id as producto,p.url as producto_url, m.nombre as marca_nombre, p.nombre as producto_nombre, c.url as categoria, m.id as marca, c.tipo_id');
		$this->db->from('productos p');
		$this->db->limit(1);
		$this->db->like('p.url', $producto);
		$this->db->join('marcas m', 'p.marca_id = m.id', 'LEFT');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id', 'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$this->db->order_by('p.sort', 'ASC');
		$query = $this->db->get();
		$data = $query->row();

		$jsonstring = json_encode($data);
		echo $jsonstring;

	}

	function newsletter(){
		$insert['email'] = $this->input->post('mail');
		$this->db->insert('newsletter', $insert);
	}

	function generateUrl(){
		$this->db->select('id, nombre');
		$this->db->from('productos');
		$productos = $this->db->get()->result();

		foreach ($productos as $producto) {
			$final = $this->toAscii($producto->nombre);
			$update['url'] = $final;
			$this->db->where('id', $producto->id);
			$this->db->update('productos', $update);

			echo "update ".$producto->id.' with '.$final.'<hr>';
		}

	}

	function toAscii($str) {

		 $clean = preg_replace("/[^a-zA-Z0-9\/_|+-]/", '', $str);
		 $clean = strtolower(trim($str, '-'));
		 $clean = preg_replace("/[\/_|+()™,; -]+/", '-', $clean);

		 return $clean;

	}

	public function error($producto){
		$data['producto'] = $producto;
		$data['categoria'] = $this->getCategorias();
		//die($this->db->last_query());
		$data['aplicacion'] = $this->getAplicaciones();
		$data['marcas'] = $this->db->get('marcas')->result();
		$this->db->select('p.id as producto,p.file_img, p.url as producto_url,c.id as categoria_id, m.imagen as marca_nombre, p.nombre as producto_nombre, c.url as categoria, m.id as marca, c.tipo_id');
		$this->db->from('productos p');
		$this->db->like('p.url', $producto);

		$this->db->join('marcas m', 'p.marca_id = m.id', 'LEFT');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id', 'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$this->db->group_by('p.id');
		$data['productos_relacionados'] = $this->db->get()->result();

		$this->load->view('site/error', $data);
	}

	public function brand($brand){
		$this->layout->setLayout('layout_products');
		$this->db->select('p.copete, m.id, c.url as categoria_url,c.tipo_id as type, p.url as producto_url,p.id as producto_id, p.nombre as producto, p.file_img, m.imagen as marca');
		$this->db->from('marcas m');
		$this->db->like('m.nombre', $brand);
		$this->db->join('productos p', 'm.id = p.marca_id');
		$this->db->join('productos_categorias pc', 'p.id = pc.producto_id', 'LEFT');
		$this->db->join('categorias c', 'pc.categoria_id = c.id', 'LEFT');
		$data['products'] = $this->db->get()->result();
		$data['active_tab'] = 'productos';
		$data['categoria'] = $this->getCategorias();
		$data['aplicacion'] = $this->getAplicaciones();
		$data['marcas'] = $this->db->get('marcas')->result();
		$data['breadcrumb'] = $brand;
		$this->layout->view('brand_products', $data);
	}

	public function meggit(){
		$this->layout->setLayout('layout_products');
		$data['active_tab'] = 'productos';
		$data['categoria'] = $this->getCategorias();
		$data['aplicacion'] = $this->getAplicaciones();
		$data['marcas'] = $this->db->get('marcas')->result();
		
		$data['breadcrumb'] = 'Meggit';
		
		$this->layout->view('meggit', $data);
	}
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
