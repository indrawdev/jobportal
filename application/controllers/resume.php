<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller {

	public function index() {
		$data['main_content'] = 'resume/resume_v';
<<<<<<< HEAD
		$data['resumes'] = $this->active_record->msrwhere(
								'resume', array('' => ''), 
								'resume_id', 'desc')->result();
								
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','resume/resume_v', $data);
		$this->template->render();
	}
	
<<<<<<< HEAD
	public function displayResume() {
		$data['main_content'] = 'resume/display_v';
		$data['resume'] = $this->active_record->msrwhere(
								'resume', array('' => ''), 
								'resume_id', 'desc')->row();
								
=======
	public function display() {
		$data['main_content'] = 'resume/display_v';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','resume/display_v', $data);
		$this->template->render();
	}
	
	public function save() {
	
	}	
}