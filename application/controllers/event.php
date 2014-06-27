<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
		$data['main_content'] = 'event/list_v';
		$this->template->write_view('content','event/list_v', $data);
		$this->template->render();
	}
	
	public function detail() {
		$data['main_content'] = 'event/detail_v';												
		$this->template->write_view('content','event/detail_v', $data);
		$this->template->render();
	}
	
}