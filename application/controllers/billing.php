<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}
	
	public function index() {
		$data['main_content'] = 'billing/billing_v';
		$this->template->write_view('content','billing/billing_v', $data);
		$this->template->render();
	}
	
	public function employer() {
		$data['main_content'] = 'billing/employer_v';
		$this->template->write_view('content','billing/employer_v', $data);
		$this->template->render();	
	}
	
	public function jobseeker() {
		$data['main_content'] = 'billing/jobseeker_v';
		$this->template->write_view('content','billing/jobseeker_v', $data);
		$this->template->render();	
	}
	
}