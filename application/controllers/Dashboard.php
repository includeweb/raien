<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->load->model('Product_Model','product');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$this->layout->view('welcome', $data, $return=false);
		}
	}

	public function productos(){
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$this->layout->view('productos/list', $data, $return=false);
	}

	public function agregar_producto(){

		if($_POST){
			
				$insert['nombre'] = $_POST['name'];
				$insert['descripcion'] = $_POST['description'];
				$insert['marca_id'] = $_POST['marca_id'];
				$insert['file_pdf'] = $_FILES['file_pdf']['name'];
				$insert['file_img'] = $_FILES['file_jpg']['name'];
				$product_id = $this->product->add_product($insert);
				$this->upload($product_id );
				redirect('Dashboard/productos');
		}

		$data['marcas'] = $this->db->get('marcas');
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();

		$this->layout->view('productos/agregar', $data, $return=false);
	}	

	
		
	public function get_product(){
		$id = $_POST['id'];
		
		if($_POST){
			
		//	$this->db->where('p.id',$id);
			$rs = $this->db->get_where('productos',array('id'=>$id));
			$products = $rs->row();
			echo json_encode($products);
			
		}

	}
	
	
	
	public function editar_producto($product_id){

		if($_POST){

			
			$update['nombre'] = $_POST['name'];
			$update['descripcion'] = $_POST['description'];
			$update['marca_id'] = $_POST['type_id'];

			if($this->upload($product_id)){

				if(!empty($_FILES['file_pdf']['name'])){
					$update['file_pdf'] = $_FILES['file_pdf']['name'];
				}				

				if(!empty($_FILES['file_jpg']['name'])){
					$update['file_img'] = $_FILES['file_jpg']['name'];
				}
				
			}


			$this->product->update_product($product_id,$update);
			redirect('Dashboard/productos');
		
		}

		$data['marcas'] = $this->db->get('marcas');
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['product'] = $this->product->get_product($product_id);

		$this->layout->view('productos/editar', $data, $return=false);
	}

	public function upload($product_id){

		if(!empty($_FILES['file_jpg']['name'])){
			$folder = DIRECTORY_UPLOAD ."/images/".$product_id;
		  	mkdir($folder,0777,TRUE);
			$file = $folder ."/". basename($_FILES['file_jpg']['name']);
			if (move_uploaded_file($_FILES['file_jpg']['tmp_name'], $file)) {
			    return true;
			} else {
			    return false;
			}

		}

		if(!empty($_FILES['file_pdf']['name'])){
			$folder = DIRECTORY_UPLOAD ."/pdf/".$product_id;
		  	mkdir($folder,0777,TRUE);
			$file = $folder ."/". basename($_FILES['file_pdf']['name']);
			if (move_uploaded_file($_FILES['file_pdf']['tmp_name'], $file)) {
			    return true;
			} else {
			    return false;
			}
		}

	}

	public function list_products(){
		$data = $this->input->post('valor');
		$resultados = intval($this->input->post('result'));

		if(!empty($data)){
		
			$array = array('p.nombre' => $data, 
				'p.descripcion' => strip_tags($data), 
				'p.file_pdf' => $data, 
				'm.nombre' => $data, 
				'p.file_img' => $data
				);
			$this->db->or_like($array);
		}
		$this->db->limit($resultados);
		$rs = $this->product->list_productos();
		$products = $rs->result();
		echo json_encode($products);
	}


	public function result(){
		$data = $this->input->post('valor');

		if(!empty($data)){
		
			$array = array('p.nombre' => $data, 
				'p.descripcion' => strip_tags($data), 
				'p.file_pdf' => $data, 
				'm.nombre' => $data, 
				'p.file_img' => $data
				);
			$this->db->or_like($array);
		}
		$rs = $this->product->list_productos();
		echo  $rs->num_rows();
	}

	public function delete(){
		$product_id = $_POST['product_id'];
		$this->db->delete('products',array('id'=>$product_id));
		return true;
	}

	public function obtener_xls(){

		//si quiero exportar una vista de la busqueda se envia un post
		// si no existe el POST exporto toda la base
		
		if($_POST){
			if(!empty($data)){
		
				$array = array('p.nombre' => $data, 
					'p.descripcion' => strip_tags($data), 
					'p.file_pdf' => $data, 
					'm.nombre' => $data, 
					'p.file_img' => $data
					);
				$this->db->or_like($array);
			}
		}
		
		$rs = $this->product->list_products();
		$data['filename'] = date('Y-m-d')."_reporte.xls";
		$data['products'] = $rs;
		echo $this->load->view('productos/obtener_xls',$data,true);
	}

	public function contactos(){
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$this->layout->view('contactos/index', $data, $return=false);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */