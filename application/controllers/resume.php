<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller {

	public function index() {
		$data['main_content'] = 'resume/resume_v';
		$data['resumes'] = $this->active_record->msrwhere(
								'resume', array('' => ''), 
								'resume_id', 'desc')->result();
								
		$this->template->write_view('content','resume/resume_v', $data);
		$this->template->render();
	}
	
	public function displayResume() {
		$data['main_content'] = 'resume/display_v';
		$data['resume'] = $this->active_record->msrwhere(
								'resume', array('' => ''), 
								'resume_id', 'desc')->row();
								
		$this->template->write_view('content','resume/display_v', $data);
		$this->template->render();
	}
	
	public function save() {
	
	}	
}