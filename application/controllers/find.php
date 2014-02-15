<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller {

	public function index() {
		$data['main_content'] = 'find_v';
		$this->template->write_view('content','find_v', $data);
		$this->template->render();
	}
	
	public function results() {
	
	}
}
