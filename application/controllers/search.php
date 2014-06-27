<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
<<<<<<< HEAD
	
	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
	}
	
	public function index() {
		$data['main_content'] = 'search_v';
		
		$data['categories'] = $this->active_record->msr(
								'category', 'category_id', 
								'asc')->result();
								
		$data['occupations'] = $this->active_record->msrwhere(
								'occupation', array('occupation_parent_id' => NULL),
								'occupation_id', 
								'asc')->result();
										
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
								
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();		
		$this->template->write_view('content','search_v', $data);
		$this->template->render();
	}
		
=======

	public function index() {
		$data['main_content'] = 'search_v';
		$this->template->write_view('content','search_v', $data);
		$this->template->render();
	}
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}
