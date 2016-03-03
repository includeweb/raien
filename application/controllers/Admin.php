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
		}
		$this->layout->view('index',$data);
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


	public function editar_producto($id){

		if($_POST){

			
			$update['nombre'] = $_POST['nombre'];
			$update['descripcion'] = $_POST['descripcion'];
			$update['marca_id'] = $_POST['marca_id'];

			if($this->upload($id)){

				if(!empty($_FILES['file_pdf']['name'])){
					$update['file_pdf'] = $_FILES['file_pdf']['name'];
				}				

				if(!empty($_FILES['file_jpg']['name'])){
					$update['file_img'] = $_FILES['file_jpg']['name'];
				}
				
			}

			$this->db->where('id',$id);
			$this->db->update('productos',$update);
			redirect('admin');
		
		}

		$data['marcas'] = $this->db->get('marcas');
		$data['user_id']	= $this->tank_auth->get_user_id();
		$data['username']	= $this->tank_auth->get_username();
		$data['role'] = $this->tank_auth->get_role();

		$data['product'] = $this->db->get_where('productos',array('id'=>$id))->row();
		$this->layout->view('editar_producto', $data);
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

	
	public function contactos(){
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['role'] = $this->tank_auth->get_role();
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

}