<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller {

	public function index() {
		$data['main_content'] = 'resume/resume_v';
		$this->template->write_view('content','resume/resume_v', $data);
		$this->template->render();
	}
	
	public function display() {
		$data['main_content'] = 'resume/display_v';
		$this->template->write_view('content','resume/display_v', $data);
		$this->template->render();
	}
	
	public function save() {
	
	}	
}