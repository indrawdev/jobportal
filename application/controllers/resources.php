<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
	
		$data['main_content'] = 'resources_v';	
											
		$this->template->write_view('content','resources_v', $data);
		$this->template->render();
	}
	
	public function employerArticle() {
	
	}
	
	public function jobseekerArticle() {
	
	}
}