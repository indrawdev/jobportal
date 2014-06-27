<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		$this->load->model('upload_mod');
	}
	
	public function employer() {
		$data['main_content'] = 'employer/employer_reg';
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
								
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();
								
		$this->template->write_view('content','employer/employer_reg', $data);
		$this->template->render();
	}
	
	public function jobseeker() {
		$data['main_content'] = 'jobseeker/jobseeker_reg';
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
								
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();
										
		$this->template->write_view('content','jobseeker/jobseeker_reg', $data);
		$this->template->render();
	}
		
	public function createEmployer() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'valid_email|callback_checkEmail|trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');	
		$this->form_validation->set_rules('city', 'City', 'trim|required');	
		$this->form_validation->set_rules('address', 'Address', 'trim|required');	
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('company_description', 'Company Description', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('logo', 'Logo', 'trim|required|xss_clean');			
		$this->form_validation->set_rules('accept', 'I Accept Agreement', 'trim|required|xss_clean');	
		
		if ($this->form_validation->run() == FALSE) {
			
			$data['response'] = 'failed';
			$attr = array(
							'email' => form_error('email', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'password' => form_error('password', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'company_name' => form_error('company_name', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'contact_name' => form_error('contact_name', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),											
							'province' => form_error('province', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),											
							'city' => form_error('city', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),											
							'address' => form_error('address', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'phone_number' => form_error('phone_number', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),	
							'company_description' => form_error('company_description', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),	
							'logo' => form_error('logo', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),	
							'accept' => form_error('accept', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')		  
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
				
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$created = dateDb();
				$companyname = $this->input->post('company_name');
				$province = $this->input->post('province');
				$city = $this->input->post('city');
				$address = $this->input->post('address');
				$phonenumber = $this->input->post('phone_number');
				$companydesc = $this->input->post('company_description');
				$logo = $this->input->post('logo');
				$accept = $this->input->post('accept');
				
				$set = array(
							'user_name' => $username,
							'password' => $password,
							'email' => $email,
							'level_id' => 1,
							'created' => $created
						);
				$table = 'user';
				$this->active_record->save($table, $set);
				$user = $this->active_record->msrwhere($table, $set, 'user_id', 'desc')->row();
				$user_id = $user->user_id;
				
				$set2 = array(
							'user_id' => $user_id,
							'company_name' => $companyname,
							'province' => $province,
							'city' => $city,
							'address' => $address,
							'phone_number' => $phonenumber,
							'company_description' => $companydesc,
							'logo' => $logo,
							'verified' => 0,
							'created' => $created,
							'isactive' => $accept
						);
				$table2 = 'employer';
				$this->active_record->save($table, $set);					
				
				$data['user'] = $this->active_record->msrwhere();
				
				$html = $this->load->view('email/account_v', $data);
				$to = $email;
				$from = 'info@kerjakita.com';
				$subject = '';
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

	public function createJobseeker() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'valid_email|callback_checkEmail|trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');		
		$this->form_validation->set_rules('province', 'Province', 'trim|required');	
		$this->form_validation->set_rules('city', 'City', 'trim|required');	
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|xss_clean');	
		$this->form_validation->set_rules('accept', 'I Accept Agreement', 'trim|required|xss_clean');	
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'email' => form_error('email', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'password' => form_error('password', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),						
							'first_name' => form_error('first_name', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),									
							'last_name' => form_error('last_name', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'gender' => form_error('gender', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'city' => form_error('city', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'address' => form_error('address', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'phone_number' => form_error('phone_number', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'accept' => form_error('accept', '<div class="alert alert-error span10 fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')			  
						);
			$data['message'] = $attr;
			echo json_encode($data);			
		}
		else {
		
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$created = dateDb();
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$gender = $this->input->post('gender');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$address = $this->input->post('address');
			$zipcode = $this->input->post('zipcode');
			$phone_number = $this->input->post('phone_number');
			$accept = $this->input->post('accept');
			
			$set = array(
						'email' => $email,
						'password' => $password,
						'level_id' => 2,
						'created' => $created
					);
			$table = 'user';
			$this->active_record->save($table, $set);
			
			$user = $this->active_record->msrwhere($table, $set, 'user_id', 'desc')->row();
			$user_id = $user->user_id;					
			$set2 = array(
						'user_id' => $user_id,
						'first_name' => $first_name,
						'last_name' => $last_name,
						'gender' => $gender,
						'province' => $province,
						'city' => $city,
						'address' => $address,
						'zipcode' => $zipcode,
						'phone_number' => $phone_number,
						'verified' => 0,
						'created' => $created,
						'isactive' => $accept
						);
			$table2 = 'jobseeker';
			$this->active_record->save($table2, $set2);
			
			$html = $this->load->view('email/account_v', $data);
			$to = $email;
			$from = 'info@kerjakita.com';
			$subject = '';
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
	
	public function checkEmail($str) {
		$email = $str;
		$check = $this->active_record->msrwhere(
						'user', array('email' => $email, 'isactive' => 1), 
						'user_id', 'asc')->num_rows();
		if ($check < 1) {
			$this->form_validation->set_message('checkEmail', 'The %s that you requested is already exist.');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	public function lookupcity(){
		$province_id = $_REQUEST['province_id'];
		$unit = $this->active_record->msrwhere(
						'city', array('province_id' => $province_id), 
						'name', 'asc')->result();
		$createJson = array();
			foreach($unit as $unit2){
				$createJson[] = array('key'=> $unit2->city_id, 'value' => ucwords(strtolower($unit2->name)));
			}
		echo json_encode($createJson);
	}

}