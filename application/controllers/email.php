<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	
	public function account() {
		$this->load->view('email/account_v');
	}
	
	public function job() {
		$this->load->view('email/job_v');
	}
		
	public function message() {
		$this->load->view('email/message_v');
	}
		
	public function resume() {
		$this->load->view('email/resume_v');		
	}
		
}