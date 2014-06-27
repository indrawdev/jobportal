<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
<<<<<<< HEAD
	
	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}
	
	public function index() {
		$this->load->library('pagination');
		$data['main_content'] = 'home_v';
		
		$data['categories'] = $this->active_record->msr(
								'category', 'category_id', 
								'asc')->result();
		
		$data['types'] = $this->active_record->msr(
								'type', 'type_id', 
								'asc')->result();
		
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
		
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();
								
		$data['salaries'] = $this->active_record->msr(
								'salary', 'salary_id', 
								'asc')->result();
		
		$config = array(
						'base_url' => '',
						'total_rows' => '',
						'per_page' => ''
						);
		$this->pagination->initialize($config);
=======

	public function index() {
		$data['main_content'] = 'home_v';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','home_v', $data);
		$this->template->render();
	}
	
}
