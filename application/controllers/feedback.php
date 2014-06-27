<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
	}
	
	public function index() {
		$data['main_content'] = 'feedback_v';
		$data['levels'] = $this->active_record->msr(
							'level', 'level_id', 
							'asc')->result();				
		$this->template->write_view('content','feedback_v', $data);
		$this->template->render();
	}
	
	public function submitFeedback() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'name' => form_error('name', '<div class="alert alert-error fade in">
                        <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
					);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$content = $this->input->post('content');
			$posted = dateDb();
			$status = '';
			
			$set = array(
					'content' => $content,
					'posted' => $posted,
					'status' => $status
					);
			$table = 'feedback';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);
		}
		
	}
	
	public function sendFeedback() {
	
	}

}
