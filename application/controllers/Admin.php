<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
		$this->load->model('Product_Model','product');
		$this->layout->setFolder('admin');
	}

	public function index(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'admin';
		}
		$this->layout->view('index',$data);
	}

	public function productos(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'productos';
		}
		$this->layout->view('productos',$data);
	}

	public function products_get(){
		$rows = $this->product->list_productos();
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function get_product(){
		$id = $_POST['id'];
		
		if($_POST){
			
		//	$this->db->where('id',$id);
			$rs = $this->db->get_where('productos',array('id'=>$id));
			$products = $rs->row();
			echo json_encode($products);
			
		}

	}	
	public function agregar_producto(){

		if($_POST){
			
				$insert['nombre'] = $_POST['name'];
				$insert['url'] = $this->toAscii($_POST['name']);
				$insert['descripcion'] = $_POST['description'];
				$insert['copete'] = $_POST['copete'];
				$insert['marca_id'] = $_POST['marca_id'];
				$insert['file_pdf'] = $_FILES['file_pdf']['name'];
				$insert['file_img'] = $_FILES['file_jpg']['name'][0];
				$product_id = $this->product->add_product($insert);
				$this->upload($product_id);
				$this->db->delete('productos_categorias',array('producto_id'=>$product_id));
				foreach ($_POST['categoria_id'] as $key => $value) {
					$this->db->insert('productos_categorias',array('producto_id'=>$product_id,'categoria_id'=>$value));
				}
		
				redirect('admin/productos');
		}
		$data['active_tab'] = 'productos';
		$data['marcas'] = $this->db->get('marcas');
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();
		$data['categorias'] = $this->db->get('categorias');

		$this->layout->view('agregar', $data, $return=false);
	}
	
	public function add_capacitaciones(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'admin';
		}
		
		if($_POST){
			$insert['from'] = $_POST['from'];
			$insert['to'] = $_POST['to'];
			$insert['descripcion'] = $_POST['descripcion'];
			
			if(!empty($_FILES['file_pdf']['name'])){
				$folder = DIRECTORY_UPLOAD ."/pdf/capacitaciones/";
				$file = $folder ."/". basename($_FILES['file_pdf']['name']);
				if (move_uploaded_file($_FILES['file_pdf']['tmp_name'], $file)) {
					$insert['file_pdf'] = $_POST['file_pdf'];
				} 
			}
			
			$insert['file_pdf'] = $_FILES['file_pdf']['name'];
			$this->db->insert('capacitaciones',$insert);
			redirect('admin/list_capacitaciones');
		}
		
		$this->layout->view('add_capacitaciones',$data);
	}
	
	public function edit_capacitaciones($id){
		if($_POST){
			$update['from'] = $_POST['from'];
			$update['to'] = $_POST['to'];
			$update['descripcion'] = $_POST['descripcion'];
			
			if(!empty($_FILES['file_pdf']['name'])){
				$folder = DIRECTORY_UPLOAD ."/pdf/capacitaciones/";
				$file = $folder ."/". basename($_FILES['file_pdf']['name']);
				if (move_uploaded_file($_FILES['file_pdf']['tmp_name'], $file)) {
					$update['file_pdf'] = $_POST['file_pdf'];
				} 
			}
			
			$update['file_pdf'] = $_FILES['file_pdf']['name'];
			$this->db->where('id',$id);
			$this->db->update('capacitaciones',$update);
			redirect('admin/list_capacitaciones');
		}
		$data['capacitacion'] = $this->db->get_where('capacitaciones',array('id'=>$id))->row();
		$this->layout->view('edit_capacitaciones',$data);
	}
		
	public function list_capacitaciones(){
		
	}
	
	public function get_capacitaciones(){
		
	}

	public function editar_producto($id){

		if($_POST){

			
			$update['nombre'] = $_POST['nombre'];
			$update['url'] = $this->toAscii($_POST['nombre']);
			$update['descripcion'] = $_POST['descripcion'];
			$update['copete'] = $_POST['copete'];
			$update['marca_id'] = $_POST['marca_id'];

			if($this->upload($id)){

				if(!empty($_FILES['file_pdf']['name'])){
					$update['file_pdf'] = $_FILES['file_pdf']['name'];
				}					
				
				if(!empty($_FILES['file1_jpg']['name'])){
					$update['file_img'] = $_FILES['file1_jpg']['name'];
				}
				
				/*
				if(!empty($_FILES['file_jpg']['name'][0])){
					$update['file_img'] = $_FILES['file_jpg']['name'][0];
				}*/
				
			}

			$this->db->where('id',$id);
			$this->db->update('productos',$update);
			$this->db->delete('productos_categorias',array('producto_id'=>$id));
			foreach ($_POST['categoria_id'] as $key => $value) {
				$this->db->insert('productos_categorias',array('producto_id'=>$id,'categoria_id'=>$value));
			}
			redirect('admin/productos');
			
		
		}
		$data['active_tab'] = 'productos';
		$data['marcas'] = $this->db->get('marcas');
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();

		$data['product'] = $this->db->get_where('productos',array('id'=>$id))->row();
		$data['categorias'] = $this->db->get('categorias');
		$data['selected_categorias'] = $this->caategoria_by_producto($id);
		$data['fotos'] = $this->db->get_where('imagen_productos',array('producto_id'=>$id));
		$this->layout->view('editar_producto', $data);
	}
	
	public function caategoria_by_producto($product_id){
		$rs = $this->db->get_where('productos_categorias',array('producto_id'=>$product_id));
		
		$array = array();
		
		if($rs->num_rows() > 0){

			foreach($rs->result() as $categoria){ 
				$array[] = $categoria->categoria_id;
			}
			
		}
		return $array;
	}
	
	public function fotos_delete(){
		$id = $_POST['id'];
		$this->db->delete("imagen_productos",array('id'=>$id));
		echo $this->db->last_query();
	}
	
	
	
	
	public function upload($product_id){
		
		if(isset($_FILES['file1_jpg']['name'])){
			if(!empty($_FILES['file_jpg']['name'])){
				$folder = DIRECTORY_UPLOAD ."/images/".$product_id;
				$file = $folder ."/". basename($_FILES['file1_jpg']['name']);
				if (move_uploaded_file($_FILES['file1_jpg']['tmp_name'], $file)) {
					$return = true;
				} else {
					$return = false;
				}
			}
		}

		if(!empty($_FILES['file_jpg']['name'])){
			/*$folder = DIRECTORY_UPLOAD ."/images/".$product_id;
		  	mkdir($folder,0777,TRUE);
			$file = $folder ."/". basename($_FILES['file_jpg']['name']);
			if (move_uploaded_file($_FILES['file_jpg']['tmp_name'], $file)) {
			    return true;
			} else {
			    return false;
			}*/
			$total = count($_FILES['file_jpg']['name']);
			for($i=0; $i<$total; $i++) {
				
				$folder = DIRECTORY_UPLOAD ."/images/".$product_id;
				if(!file_exists($folder)){
					mkdir($folder,0777,TRUE);
				}
				
				$filename = basename($_FILES['file_jpg']['name'][$i]);
				$file = $folder."/".$filename;
			
				$tmpFilePath = $_FILES['file_jpg']['tmp_name'][$i];
				if ($tmpFilePath != ""){
					$newFilePath = "./uploadFiles/" . $_FILES['file_jpg']['name'][$i];
					if(move_uploaded_file($tmpFilePath, $file)){
						$return = true;	
						$this->db->insert('imagen_productos',
							array(
							'producto_id'=>$product_id,
							'filename'=>$filename
							)
						);	
					}
				}
			}
			
			if(isset($return )){
				return true;
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

	public function contactos(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'contactos';
		}
		$this->layout->view('contactos',$data);

	}

	public function get_contactos(){
		$rows = $this->db->get('contacts');
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function get_contact(){
		$id = $_POST['id'];
		
		if($_POST){
			
		//	$this->db->where('id',$id);
			$rs = $this->db->get_where('contacts',array('id'=>$id));
			$products = $rs->row();
			echo json_encode($products);
			
		}

	}

	public function cvs(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'cvs';
		}
		$this->layout->view('cvs',$data);
	}

	public function get_cvs(){
		$rows = $this->db->get('teams');
		$array = array();
		foreach ($rows->result() as $row) {
			$array[] = $row;
		}
		echo json_encode($array);
	}

	public function cv_delete(){
		$id = $_POST['id'];
		$this->db->delete('teams',array('id'=>$id));
	}	

	public function contact_delete(){
		$id = $_POST['id'];
		$this->db->delete('contacts',array('id'=>$id));
	}	

	public function producto_delete(){
		$id = $_POST['id'];
		$this->db->delete('productos',array('id'=>$id));
	}
	
	public function suscripciones(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
			$data['active_tab'] = 'suscripciones';
		}
		$this->layout->view('suscripciones',$data);
	}	
	
	public function get_suscripciones(){
		$rs = $this->db->get('newsletter');
		$suscripciones = $rs->result();
		echo json_encode($suscripciones);
	}	
	
	public function delete_suscripcion(){
		$id = $_POST['id'];
		$this->db->delete('newsletter',array('id'=>$id));
	}
	/*
	function toAscii($str) {
		$str = strip_tags($str);	
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+-]/", '', $str);
		$clean = strtolower(trim($str, '-'));
		$clean = preg_replace("/[\/_|+()™,; -]+/", '-', $clean);
		$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		$clean = utf8_decode($clean);
		$clean = strtr($clean, utf8_decode($originales), $modificadas);
		$clean = strtolower($clean);
		return utf8_encode($clean);
		return $clean;
	}
	*/
	
	function toAscii($str, $replace=array(), $delimiter='-') {
		$str = strip_tags($str);
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}
	
	public function get_fotos(){
		$data['id'] = $_POST['id'];
		$data['rs'] = $this->db->get_where('productos',array('id'=>$data['id']));
		$data['rs1'] = $this->db->get_where('imagen_productos',array('producto_id'=>$data['id']));
		echo $this->load->view('admin/get_fotos',$data,true);
	}
	
	
	function sobrante(){
		$rs = $this->db->get('productos');
		foreach($rs->result() as $value){
			$folder = DIRECTORY_UPLOAD ."/pdf/".$value->id."/".$value->file_pdf;
			if (file_exists($folder)) {
				echo "El fichero $value->file_pdf existe <br />";
			} else {
				$this->db->where('id',$value->id);
				$this->db->update('productos',array('file_pdf'=>''));
				echo "El fichero $value->file_pdf no existe <br />";
			}
			
		}
	}

}