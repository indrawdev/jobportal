<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseeker extends CI_Controller {

	public function index() {
		$data['main_content'] = 'jobseeker/jobseeker_v';
		$this->template->write_view('content','jobseeker/jobseeker_v', $data);
		$this->template->render();
	}
	
	public function register() {
		$data['main_content'] = 'jobseeker/jobseeker_reg';
		$this->template->write_view('content','jobseeker/jobseeker_reg', $data);
		$this->template->render();
	}
	
	public function createJobseeker() {
		
	}
	
	public function login() {
		$data['main_content'] = 'jobseeker/jobseeker_login';
		$this->template->write_view('content','jobseeker/jobseeker_login', $data);
		$this->template->render();
	}
	
	public function account() {
		$data['main_content'] = 'jobseeker/jobseeker_account';
		$this->template->write_view('content','jobseeker/jobseeker_account', $data);
		$this->template->render();
	}
	
	public function postresume() {
		$data['main_content'] = 'jobseeker/post_resume';
		$this->template->write_view('content','jobseeker/post_resume', $data);
		$this->template->render();
	}
	
	public function saveResume() {
	
	}
	
	public function resume() {
		$data['main_content'] = 'jobseeker/resume_list';
		$this->template->write_view('content','jobseeker/resume_list', $data);
		$this->template->render();
	}
	
	public function editresume() {
		$data['main_content'] = 'jobseeker/edit_resume';
		$this->template->write_view('content','jobseeker/edit_resume', $data);
		$this->template->render();
	}
	
	public function updateResume() {
	
	}
	
	public function application() {
		$data['main_content'] = 'jobseeker/application_v';
		$this->template->write_view('content','jobseeker/application_v', $data);
		$this->template->render();			
	}
	
	public function addjobalert() {
		$data['main_content'] = 'jobseeker/addjob_alert';
		$this->template->write_view('content','jobseeker/addjob_alert', $data);
		$this->template->render();
	}
	
	public function saveJobalert() {
	
	}
		
	public function jobalert() {
		$data['main_content'] = 'jobseeker/job_alert';
		$this->template->write_view('content','jobseeker/job_alert', $data);
		$this->template->render();
	}
	
	public function editjobalert() {
		$data['main_content'] = 'jobseeker/editjob_alert';
		$this->template->write_view('content','jobseeker/editjob_alert', $data);
		$this->template->render();
	}
	
	public function updateJobalert(){
	
	}
	
	public function changepassword() {
		$data['main_content'] = 'jobseeker/reset_pass';
		$this->template->write_view('content','jobseeker/reset_pass', $data);
		$this->template->render();
	}
	
	public function savePassword() {
	
	}
		
}