<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function about() {
		$data['main_content'] = 'page/about_v';
		$this->template->write_view('content','page/about_v', $data);
		$this->template->render();
	}
	
	public function faq() {
		$data['main_content'] = 'page/faq_v';
		$this->template->write_view('content','page/faq_v', $data);
		$this->template->render();
	}
	
	public function terms() {
		$this->load->model('active_record');
		$data['main_content'] = 'page/terms_v';
		$data['employers'] = $this->active_record->msrwhere(
								'package', array('level_id' => 1), 
								'package_id', 'asc')->result();
								
		$data['jobseekers'] = $this->active_record->msrwhere(
								'package', array('level_id' => 2), 
								'package_id', 'asc')->result();
								
		$this->template->write_view('content','page/terms_v', $data);
		$this->template->render();
	}
	
	public function privacy() {
		$data['main_content'] = 'page/privacy_v';
		$this->template->write_view('content','page/privacy_v', $data);
		$this->template->render();
	}
		
	public function careers() {
		$data['main_content'] = 'page/careers_v';
		$this->template->write_view('content','page/careers_v', $data);
		$this->template->render();
	}

	public function partners() {
		$data['main_content'] = 'page/partners_v';
		$this->template->write_view('content','page/partners_v', $data);
		$this->template->render();
	}
		
}