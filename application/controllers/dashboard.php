<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		
		if($this->session->userdata('login') != TRUE || $this->session->userdata('level_id') != 4) {
			$direct = root().'login';
			redirect($direct);
		}
		
	}
	
	public function index() {
		$data['main_content'] = 'dashboard/dashboard_v';
		$this->template->write_view('dashboard/dashboard_v', $data);
		$this->template->render();
	}
	
	
}