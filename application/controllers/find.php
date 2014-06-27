<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller {

<<<<<<< HEAD
	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}

	public function index() {
		$data['main_content'] = 'find_v';
		
		$data['categories'] = $this->active_record->msr(
								'category', 'category_id', 
								'asc')->result();
								
		$data['occupations'] = $this->active_record->msrwhere(
								'occupation', array('occupation_parent_id' => NULL),
								'occupation_id', 
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
								
=======
	public function index() {
		$data['main_content'] = 'find_v';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','find_v', $data);
		$this->template->render();
	}
	
<<<<<<< HEAD
	public function searchJobByLocation() {
		$title = $this->input->post('title');
		$location = $this->input->post('city');
	}
	
	public function searchJobByType() {
		$category = $this->input->post('category');
		$type = $this->input->post('type');
		$salary = $this->input->post('salary');
		$posted = $this->input->post('posted');
	}
	
	public function results() {
		$data['main_content'] = 'result_v';
		$this->template->write_view('content','result_v', $data);
		$this->template->render();
	}
		
=======
	public function results() {
	
	}
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}
