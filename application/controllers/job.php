<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
	}
	
	public function index() {
		$data['main_content'] = 'job/job_v';
		$data['jobs'] = $this->active_record->msr('job', 'job_id', 'desc')->result();
		$this->template->write_view('content','job/job_v', $data);
		$this->template->render();
	}
	
	public function display() {
		$data['main_content'] = 'job/display_v';
		$job_id = $this->uri->segment(3);
		$data['job'] = $this->active_record->msrwhere(
								'job', array('job_id' => $job_id), 
								'job_id', 'desc')->row();
								
		$this->template->write_view('content','job/display_v', $data);
		$this->template->render();
	}
	
	public function apply() {
	
		if($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 2) {
			$data['main_content'] = 'job/apply_v';
			
			$job_id = $this->uri->segment(3);
			$user_id = decrypt($this->session->userdata('user_id'));
			$jobseeker_id = decrypt($this->session->userdata('jobseeker_id'));
			
			$data['jobs'] = $this->active_record->msrwhere(
									'job', array('job_id' => $job_id), 
									'job_id', 'desc')->row();
									
			$data['resumes'] = $this->active_record->msrwhere(
									'resume', array('user_id' => $user_id, 
									'jobseeker_id' => $jobseeker_id, 'isactive' => 1), 
									'resume_id', 'desc')->result();
	
			$this->template->write_view('content','job/apply_v', $data);
			$this->template->render();
		}
		else {
			$data['main_content'] = 'login_v';
			$this->template->write_view('content','login_v', $data);
			$this->template->render();
		}				
	}
	
	public function applyJob() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('subject', 'First Name', 'trim|required');
		$this->form_validation->set_rules('attachment', 'Attachment', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'first_name' => form_error('first_name', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'last_name' => form_error('last_name', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'email' => form_error('email', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'subject' => form_error('subject', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'attachment' => form_error('attachment', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')										  										
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$job_id = $this->input->post('job_id');			
			$job_title = $this->input->post('job_title');
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$attachment = $this->input->post('attachment');
			$cover_letter = $this->input->post('cover_letter');			
			$status = '';
			$posted = '';
			
			$set = array(		
						'job_id' => $job_id,														
						'job_title' => $job_title,
						'first_name' => $first_name,
						'last_name' => last_name,
						'email' => $email,
						'subject' => $subject,
						'attachment' => $attachment,
						'cover_letter' => $cover_letter,
						'status' => $status,
						'posted' => $posted,
						'isactive' => 1
						);
			
			$table = '';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}		
		
	}
	
	public function saveJob() {
		
		$job_id = $this->input->post('job_id');
		$employer_id = '';
		$user_id = '';
		$title = $this->input->post('title');
		$posted = '';
		$set = array(
					'job_id' => $job_id,
					'employer_id' => $employer_id,
					'user_id' => $user_id,
					'title' => $title,
					'posted' => $posted,
					'isactive' => 1
					);
		$table = 'save_job';
		$this->active_record->save($table, $set);
		$data['response'] = 'success';
		echo json_encode($data);
		
	}
	
	public function submitFriend() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('your_name', 'Your Name', 'trim|required');
		$this->form_validation->set_rules('friend_name', 'Friend Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Friend Email', 'trim|required');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required');
				
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'your_name' => form_error('your_name', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'friend_name' => form_error('friend_name', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'email' => form_error('email', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'comment' => form_error('comment', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$your_name = $this->input->post('your_name');
			$friend_name = $this->input->post('friend_name');
			$email = $this->input->post('email');
			$comment = $this->input->post('comment');
			$created = '';
			
			$set = array(
						'your_name' => $your_name,
						'friend_name' => $friend_name,
						'email' => $email,
						'comment' => $comment,
						'created' => $created
						);
			$table = 'tell_friend';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}		
	}
	
	public function submitFlag() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('flag_type', 'Type', 'trim|required');
		$this->form_validation->set_rules('comment', 'Comment', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'flag_type' => form_error('flag_type', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'comment' => form_error('comment', '<div class="alert alert-block alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')									
						);
			$data['message'] = $attr;
			echo json_encode($data);										  
		}
		else {
			$flag_type_id = $this->input->post('flag_type');
			$comment = $this->input->post('comment');
			$created = '';
			
			$set = array(
						'flag_type_id' => $flag_type_id,
						'comment' => $comment,
						'created' => $created
						);
			$table = 'flag';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}				
	}		
}