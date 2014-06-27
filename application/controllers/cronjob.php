<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cronjob extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('blaster_mod');
	}

	public function jobAlert() {
	
		$this->active_recode->msrwhere('');
		
	}
	
	public function invoiceAlert() {
		
		
	}

	public function paymentAlert() {
	
		
	}

}