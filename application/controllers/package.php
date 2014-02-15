<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package extends CI_Controller {

	public function index() {
		$data['main_content'] = 'package/package_v';
		$this->template->write_view('content','package/package_v', $data);
		$this->template->render();
	}
	public function employer() {
		$data['main_content'] = 'package/package_employer';
		$this->template->write_view('content','package/package_employer', $data);
		$this->template->render();
	}
	public function jobseeker() {
		$data['main_content'] = 'package/package_jobseeker';
		$this->template->write_view('content','package/package_jobseeker', $data);
		$this->template->render();
	}		
	
}