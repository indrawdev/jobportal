<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['main_content'] = 'home_v';
		$this->template->write_view('content','home_v', $data);
		$this->template->render();
	}
	
}
