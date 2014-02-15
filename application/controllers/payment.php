<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function index() {
		$data['main_content'] = 'payment/payment_v';
		$this->template->write_view('content','payment/payment_v', $data);
		$this->template->render();
	}
	
	public function invoice() {
		$data['main_content'] = 'payment/invoice_v';
		$this->template->write_view('content','payment/invoice_v', $data);
		$this->template->render();
	}
	
	public function confirmation() {
		$data['main_content'] = 'payment/confirmation_v';
		$this->template->write_view('content','payment/confirmation_v', $data);
		$this->template->render();
	}
		
}