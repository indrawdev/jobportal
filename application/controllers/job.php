<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {

	public function index() {
		$data['main_content'] = 'job/job_v';
		$this->template->write_view('content','job/job_v', $data);
		$this->template->render();
	}
	
	public function display() {
		$data['main_content'] = 'job/display_v';
		$this->template->write_view('content','job/display_v', $data);
		$this->template->render();
	}
	
	public function apply() {
		$data['main_content'] = 'job/apply_v';
		$this->template->write_view('content','job/apply_v', $data);
		$this->template->render();
	}
	
	public function sendResume() {
	
	}
	
	public function saveJob() {
	
	}	
}