<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {
	
	public function missing() {
		$data['main_content'] = 'redirect/404';
		$this->template->write_view('content','redirect/404', $data);
		$this->template->render();
	}
	
	public function unconnectdb() {
		$data['main_content'] = 'redirect/123';
		$this->template->write_view('content','redirect/3306', $data);
		$this->template->render();
	}
	
	
}