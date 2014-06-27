<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		
		if($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 1) {
			$direct = base_url().'employer';
			redirect($direct);
		}	
		else if($this->session->userdata('login') == TRUE && $this->session->userdata('level_id') == 2) {
			$direct = base_url().'jobseeker';
			redirect($direct);	
		}	
		
	}
	
	public function index() {
		$data['main_content'] = 'login_v';
		$this->template->write_view('content','login_v', $data);
		$this->template->render();
	}
		
	public function processLogin() {
		$rules = array(
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|xss_clean'
							),
						array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|xss_clean'
							)
						);
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
    		$data['message']  = validation_errors();
    		echo json_encode($data);
		}
		else {
			
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			
			$query = $this->active_record->msrwhere(
							'view_user_login', array('email' => $email,
							'password' => $password, 'isactive' => 1), 
							'user_id', 'asc')->row();

			if (count($query) < 1) {
				$data['response'] = 'failed';
				$data['message']  = 'Your email or password is incorrect';
				echo json_encode($data);
			}
			else {
				$check_session = $this->active_record->edit(
										'ci_sessions', array('user_id' => $query->user_id, 
										'last_activity' => 'CURRENT_TIMESTAMP',
										'level_id' => $query->level_id,
										'employer_id' => $query->employer_id,
										'jobseeker_id' => $query->jobseeker_id), 
										'session_id', $this->session->userdata('session_id'));
				
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('email', encrypt($query->email));
				$this->session->set_userdata('user_id', encrypt($query->user_id));
				$this->session->set_userdata('level_id', $query->level_id);
				$this->session->set_userdata('employer_id', encrypt($query->employer_id));
				$this->session->set_userdata('jobseeker_id', encrypt($query->jobseeker_id));
				
				$data['response'] = 'success';
				
				if ($query->level_id == 1) {
					$data['redirect'] = base_url().'employer';
				}
				else if ($query->level_id == 2) {
					$data['redirect'] = base_url().'jobseeker';
				}
				else if ($query->level_id == 4) {
					$data['redirect'] = base_url().'dashboard';
				}
				echo json_encode($data);
				
					
			}
			
		}			
	
	}
	
	public function forgotpassword() {
		$data['main_content'] = 'forgot_v';
		$this->template->write_view('content','forgot_v', $data);
		$this->template->render();
	}
	
	public function checkEmail($str) {
		$email = $str;
		$check = $this->active_record->msrwhere(
						'user', array('email' => $email, 'isactive' => 1), 
						'user_id', 'asc')->num_rows();
		if ($check < 1) {
			$this->form_validation->set_message('checkEmail', 'The %s is invalid.');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	public function randomPass() {
		$codelenght = 6;
		$newcode_length = 1;
		$newcodecover= 'x';
		while ($newcode_length < $codelenght) {
			$x=1;
			$y=3;
			$part = rand($x,$y);
			if($part==1){$a=48;$b=57;}  // Numbers
			if($part==2){$a=65;$b=90;}  // UpperCase
			if($part==3){$a=97;$b=122;} // LowerCase
			$code_part=chr(rand($a,$b));
			$newcode_length = $newcode_length + 1;
			$newcodecover = $newcodecover.$code_part;
		}
		$length = strlen($newcodecover);
			if($length > 7){
				$new = substr($newcodecover,0,7);
			}
			else {
				$new = $newcodecover;
			}
		return $new;
	}
	
	public function sendPassword() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_checkEmail|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$data['message']  = validation_errors();
			echo json_encode($data);
		}
		else {
			$email = $this->input->post('email');
			$newpass = $this->randomPass();
			$updated = dateDb();
			
			$set = array(
						'password' => md5($newpass),
						'updated' => $updated
 						);
			$table = 'user';
			$this->active_record->edit($table, $set, 'email', $email);
			$getdata = $this->active_record->msrwhere(
									'user', array('email' => $email, 
									'password' => $newpass), 
									'user_id', 'asc')->row();
			
			// get data employer / jobseeker
			$data['user'] = '';
			
			$html = $this->load->view('email/forgot_v', $data);
			$to = $email;
			$from = 'info@kerjakita.com';
			$subject = 'Info Password terbaru di KerjaKita.com';
			$content = $html;
			$headers = 'From: '.$from.'' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
				if($to != '') {
					$this->email_mod->sendEmail($from, $to ,$subject, $content);
				}
				
			$data['response'] = 'success';
			echo json_encode($data);
		}
	}
	

}