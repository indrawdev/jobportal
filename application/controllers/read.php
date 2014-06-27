<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Read extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
		$data['main_content'] = 'read/read_v';
		$this->template->write_view('content','read/read_v', $data);
		$this->template->render();
	}
	
	public function display() {
	
	}

}