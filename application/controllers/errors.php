<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {
	
	public function missing() {
		$data['main_content'] = 'redirect/404';
		$this->template->write_view('content','redirect/404', $data);
		$this->template->render();
	}
<<<<<<< HEAD
	
	public function unconnectdb() {
		$data['main_content'] = 'redirect/123';
		$this->template->write_view('content','redirect/3306', $data);
		$this->template->render();
	}
	
	
=======

>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}