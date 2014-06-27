<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

<<<<<<< HEAD
	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		
		if($this->session->userdata('login') != TRUE) {
			$direct = root().'login';
			redirect($direct);
		}
	}
	
	public function index() {
		$data['main_content'] = 'message/list';
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['messages'] = $this->active_record->msrwhere(
									'message', array('user_id_from' => $user_id, 
									'isactive' => 1), 'message_id', 
									'desc')->result();
									
=======
	public function index() {
		$data['main_content'] = 'message/list';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','message/list', $data);
		$this->template->render();
	}
	
<<<<<<< HEAD
	public function inbox() {
		$data['main_content'] = 'message/inbox';
		$this->template->write_view('content','message/inbox', $data);
		$this->template->render();	
	}
	
	public function outbox() {
		$data['main_content'] = 'message/outbox';
		$this->template->write_view('content','message/outbox', $data);
		$this->template->render();	
	}
		
	public function send() {
		$data['main_content'] = 'message/send';
		$this->template->write_view('content','message/send', $data);
		$this->template->render();
	}
	
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	public function reply() {
		$data['main_content'] = 'message/reply';
		$this->template->write_view('content','message/reply', $data);
		$this->template->render();
	}	
	
<<<<<<< HEAD
	/*public function edit() {
		$data['main_content'] = 'message/edit';
		$this->template->write_view('content', 'message/edit', $data);
		$this->template->render();
	}*/
	
	public function sendMessage() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('subject', 'Name', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'subject' => form_error('subject', '<div class="alert alert-block alert-error fade in">
                                      <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
						'message' => form_error('message', '<div class="alert alert-block alert-error fade in">
                                       <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);
						
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$user_id_from = decrypt($this->session->userdata('user_id'));
			$user_id_to = decrypt($this->input->post('user_id_to'));
			$message_parent_id = NULL;
			$subject = $this->input->post('subject');
			$message = 	$this->input->post('message');
			$date = dateDb();
			
			$set = array(
						'message_parent_id' => $message_parent_id,
						'user_id_from' => $user_id_from,
						'user_id_to' => $user_id_to,
						'subject' => $subject,
						'message' => $message,
						'date' => $date,
						'isactive' => 1
						);
			$table = 'message';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}
		
	}
	
	public function replyMessage() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'message' => form_error('message', '<div class="alert alert-block alert-error fade in">
                                       <a class="close" data-dismiss="alert" href="#">x</a>','</div>')						
						);
			
			$data['message'] = $attr;
			echo json_encode($data);						
		}
		else {
			$message_parent_id = decrypt($this->input->post('message_parent_id'));
			$user_id_from = decrypt($this->session->userdata('user_id'));
			$user_id_to = decrypt($this->input->post('user_id_to'));
			$subject = $this->input->post('subject');
			$message = 	$this->input->post('message');
			$date = dateDb();	
			
			$set = array(
						'message_parent_id' => $message_parent_id,
						'user_id_from' => $user_id_from,
						'user_id_to' => $user_id_to,
						'subject' => $subject,
						'message' => $message,
						'date' => $date,
						'isactive' => 1
						);
			$table = 'message';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}
	}
	
	public function updateMessage() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'message' => form_error('message', '<div class="alert alert-block alert-error fade in">
                                       <a class="close" data-dismiss="alert" href="#">x</a>','</div>')						
						);
			
			$data['message'] = $attr;
			echo json_encode($data);						
		}
		else {
			$message_id = '';
			$message_parent_id = '';
			$user_id_from = '';
			$user_id_to = '';
			$subject = $this->input->post('subject');
			$message = 	$this->input->post('message');
			$date = dateDb();	
			
			$set = array(
						'message_parent_id' => $message_parent_id,
						'user_id_from' => $user_id_from,
						'user_id_to' => $user_id_to,
						'subject' => $subject,
						'message' => $message,
						'date' => $date
						);
			$table = 'message';
			$this->active_record->edit($table, $set, 'message_id', $message_id);
			$data['response'] = 'success';
			echo json_encode($data);		
		}	
	}
	
	public function deleteMessage() {
		$message_id = $this->uri->segment(3);
		$set = array(
					'isactive' => 0
					);
		$table = 'message';
		$this->active_record->edit($table, $set, 'message_id', $message_id);
		$data['response'] = 'success';
		echo json_encode($data);
=======
	
	public function privatemessage() {
		
	}
	
	public function sendMessage() {
	
	}
	
	public function replyMessage() {
	
	}
	
	public function deleteMessage() {
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	}

}