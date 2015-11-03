<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout');
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
		$this->layout->view('productos/index', $data, $return=false);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */