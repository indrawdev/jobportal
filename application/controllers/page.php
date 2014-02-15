<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function about() {
		$data['main_content'] = 'page/about_v';
		$this->template->write_view('content','page/about_v', $data);
		$this->template->render();
	}
	public function terms() {
		$data['main_content'] = 'page/terms_v';
		$this->template->write_view('content','page/terms_v', $data);
		$this->template->render();
	}
	public function privacy() {
		$data['main_content'] = 'page/privacy_v';
		$this->template->write_view('content','page/privacy_v', $data);
		$this->template->render();
	}	

}