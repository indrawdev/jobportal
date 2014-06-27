<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
		$data['main_content'] = 'user/list_v';
		$data['users'] = $this->active_record->msr(
								'jobseeker', 'jobseeker_id', 
								'desc')->result();
								
		$this->template->write_view('content','user/list_v', $data);
		$this->template->render();
	}
	
	public function detail() {
		$data['main_content'] = 'user/detail_v';
		$jobseeker_id = $this->uri->segment(3);
		$data['user'] = $this->active_record->msrwhere(
							'jobseeker', array('jobseeker_id' => $jobseeker_id),
							'jobseeker_id', 'desc')->row();
							
		$this->template->write_view('content','user/detail_v', $data);
		$this->template->render();
	}
	
}