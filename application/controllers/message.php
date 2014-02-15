<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

	public function index() {
		$data['main_content'] = 'message/list';
		$this->template->write_view('content','message/list', $data);
		$this->template->render();
	}
	
	public function reply() {
		$data['main_content'] = 'message/reply';
		$this->template->write_view('content','message/reply', $data);
		$this->template->render();
	}	
	
	
	public function privatemessage() {
		
	}
	
	public function sendMessage() {
	
	}
	
	public function replyMessage() {
	
	}
	
	public function deleteMessage() {
	
	}

}