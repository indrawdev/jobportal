<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller {

	public function index() {
		$data['main_content'] = 'employer/employer_v';
		$this->template->write_view('content','employer/employer_v', $data);
		$this->template->render();
	}
	
	public function register() {
		$data['main_content'] = 'employer/employer_reg';
		$this->template->write_view('content','employer/employer_reg', $data);
		$this->template->render();
	}
	
	public function createEmployer() {
	}
	
	public function login() {
		$data['main_content'] = 'employer/employer_login';
		$this->template->write_view('content','employer/employer_login', $data);
		$this->template->render();
	}
	
	public function account() {
		$data['main_content'] = 'employer/employer_account';
		$this->template->write_view('content','employer/employer_account', $data);
		$this->template->render();
	}
	
	public function postjob() {
		$data['main_content'] = 'employer/post_job';
		$this->template->write_view('content','employer/post_job', $data);
		$this->template->render();			
	}
	
	public function saveJob() {
	
	}
	
	public function joblist() {
		$data['main_content'] = 'employer/job_list';
		$this->template->write_view('content','employer/job_list', $data);
		$this->template->render();			
	}
	
	public function editjob() {
		$data['main_content'] = 'employer/edit_job';
		$this->template->write_view('content','employer/edit_job', $data);
		$this->template->render();			
	}
	
	public function updateJob() {
	
	}
	
	public function application() {
		$data['main_content'] = 'employer/application_v';
		$this->template->write_view('content','employer/application_v', $data);
		$this->template->render();			
	}
	
	public function addresumealert() {
		$data['main_content'] = 'employer/addresume_alert';
		$this->template->write_view('content','employer/addresume_alert', $data);
		$this->template->render();
	}
			
	public function saveResumealert() {
	
	}
	
	public function resumealert() {
		$data['main_content'] = 'employer/resume_alert';
		$this->template->write_view('content','employer/resume_alert', $data);
		$this->template->render();
	}
	
	public function editresumealert() {
		$data['main_content'] = 'employer/editresume_alert';
		$this->template->write_view('content','employer/editresume_alert', $data);
		$this->template->render();
	}		
	
	public function updateResumealert() {
	
	}
		
	public function changepassword() {
		$data['main_content'] = 'employer/reset_pass';
		$this->template->write_view('content','employer/reset_pass', $data);
		$this->template->render();
	}
	
	public function savePassword() {
	
	}
	
}
