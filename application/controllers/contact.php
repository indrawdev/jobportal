<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index() {
		$data['main_content'] = 'contact_v';
		$this->template->write_view('content','contact_v', $data);
		$this->template->render();
	}
}