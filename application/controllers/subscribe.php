<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		
	}
	
	public function submit() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'email' => form_error('email', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')	  
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$email = $this->input->post('email');
			$date = dateDb();
			$set = array(
						'email' => $email,
						'date' => $date,
						'isactive' => 1
						);
			$table = 'subscribe';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}			
	}

	public function unsubscribe() {
		$data['main_content'] = 'unsubscribe_v';
		$this->template->write_view('content','unsubscribe_v', $data);
		$this->template->render();
	}
	
	public function update() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'email' => form_error('email', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')	  
						);
			$data['message'] = $attr;
			echo json_encode($data);			
		}
		else {
			$email = $this->input->post('email');
			$set = array(
						'isactive' => 0
						);
			$table = 'subscribe';
			$this->active_record->edit($table, $set, 'email', $email);
			$data['response'] = 'success';
			echo json_encode($data);			
		}	
	}		
}