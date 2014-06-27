<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
		$data['main_content'] = 'company/list_v';
		$data['companies'] = $this->active_record->msr(
								'employer', 'employer_id', 
								'desc')->result();
		$this->template->write_view('content','company/list_v', $data);
		$this->template->render();
	}
	
	public function detail() {
		$data['main_content'] = 'company/detail_v';
		$employer_id = $this->uri->segment(3);
		$data['company'] = $this->active_record->msrwhere(
							'employer', array('employer_id' => $employer_id),
							'employer_id', 'desc')->row();
							
		$data['joblist'] = $this->active_record->msrwhere(
							'job', array('employer_id' => $employer_id), 
							'job_id', 'desc')->result();
												
		$this->template->write_view('content','company/detail_v', $data);
		$this->template->render();
	}
	
}