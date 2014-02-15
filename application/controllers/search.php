<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index() {
		$data['main_content'] = 'search_v';
		$this->template->write_view('content','search_v', $data);
		$this->template->render();
	}
	
}
