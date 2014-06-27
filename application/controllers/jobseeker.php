<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseeker extends CI_Controller {

<<<<<<< HEAD
	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		$this->load->model('generate_mod');

		if($this->session->userdata('login') != TRUE || $this->session->userdata('level_id') != 2) {
			$direct = root().'login';
			redirect($direct);
		}		
	}
	
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	public function index() {
		$data['main_content'] = 'jobseeker/jobseeker_v';
		$this->template->write_view('content','jobseeker/jobseeker_v', $data);
		$this->template->render();
	}
	
<<<<<<< HEAD
	public function account() {
		$data['main_content'] = 'jobseeker/jobseeker_account';
		$jobseeker_id = decrypt($this->session->userdata('jobseeker_id'));
		$data['account'] = $this->active_record->msrwhere(
								'jobseeker', array('jobseeker_id' => $jobseeker_id, 
								'isactive' => 1), 'jobseeker_id', 'desc')->row();
								
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
		
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();
								
		$this->template->write_view('content','jobseeker/jobseeker_account', $data);
		$this->template->render();
	}

	public function updateAccount() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');				
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'first_name' => form_error('first_name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'last_name' => form_error('last_name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'), 
							'city' => form_error('city', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'address' => form_error('address', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),  								
							'phone_number' => form_error('phone_number', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);	
			$data['message'] = $attr;
			echo json_encode($data);		
		}
		else {
			$jobseeker_id = decrypt($this->session->userdata('jobseeker_id'));
			$user_id = decrypt($this->session->userdata('user_id'));
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$province_id = $this->input->post('province');
			$city_id = $this->input->post('city');
			$address = $this->input->post('address');
			$zipcode = $this->input->post('zipcode');
			$phone_number = $this->input->post('phone_number');
			$linkedin = $this->input->post('linkedin');
			$modified = dateDb();
			
			$set = array(
						'first_name' => $first_name,
						'last_name' => $last_name,
						'province_id' => $province_id,
						'city_id' => $city_id,
						'address' => $address,
						'zipcode' => $zipcode,
						'phone_number' => $phone_number,
						'linkedin' => $linkedin,
						'modified' => $modified,
						'isactive' => 1
						);
			$table = 'jobseeker';
			$this->active_record->edit($table, $set, 'jobseeker_id', $jobseeker_id);
			$data['response'] = 'success';
			echo json_encode($data);		
		}
		
	}

	public function checkPackage() {
		$user_id = decrypt($this->session->userdata('user_id'));
		$check = $this->active_record->msrwhere(
									'transaction', array('user_id' => $user_id), 
									'transaction_id', 'asc')->result();
		
	}
		
	public function postresume() {
		$data['main_content'] = 'jobseeker/post_resume';
		
		$data['categories'] = $this->active_record->msr(
								'category', 'category_id', 
								'asc')->result();
								
		$data['occupations'] = $this->active_record->msrwhere(
								'occupation', array('occupation_parent_id' => NULL),
								'occupation_id', 
								'asc')->result();
										
		$data['types'] = $this->active_record->msr(
								'type', 'type_id', 
								'asc')->result();
		
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
		
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();		
		
		$data['salaries'] = $this->active_record->msr(
								'salary', 'salary_id', 
								'asc')->result();
								
=======
	public function register() {
		$data['main_content'] = 'jobseeker/jobseeker_reg';
		$this->template->write_view('content','jobseeker/jobseeker_reg', $data);
		$this->template->render();
	}
	
	public function createJobseeker() {
		
	}
	
	public function login() {
		$data['main_content'] = 'jobseeker/jobseeker_login';
		$this->template->write_view('content','jobseeker/jobseeker_login', $data);
		$this->template->render();
	}
	
	public function account() {
		$data['main_content'] = 'jobseeker/jobseeker_account';
		$this->template->write_view('content','jobseeker/jobseeker_account', $data);
		$this->template->render();
	}
	
	public function postresume() {
		$data['main_content'] = 'jobseeker/post_resume';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','jobseeker/post_resume', $data);
		$this->template->render();
	}
	
	public function saveResume() {
<<<<<<< HEAD
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('occupations', 'Occupations', 'trim|required');	
		$this->form_validation->set_rules('type', 'Job Type', 'trim|required');
		$this->form_validation->set_rules('objective', 'Objective', 'trim|required');
		$this->form_validation->set_rules('skills', 'Skills', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');	
		$this->form_validation->set_rules('city', 'City', 'trim|required');	
		$this->form_validation->set_rules('salary', 'Salary', 'trim|required');	
		$this->form_validation->set_rules('photo', 'Photo', 'trim|required');	
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'title' => form_error('title', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'category' => form_error('category', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'occupations' => form_error('occupations', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'type' => form_error('type', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),									
							'objective' => form_error('objective', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'skills' => form_error('skills', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'city' => form_error('city', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),	
							'salary' => form_error('salary', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),  
							'photo' => form_error('photo', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')										
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			//$number = $this->generate_mod->idResume();
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$occupation = $this->input->post('occupation');
			$type = $this->input->post('type');
			$objective = $this->input->post('objective');
			$skills = $this->input->post('skills');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$zipcode = $this->input->post('zipcode');
			$desired_salary = $this->input->post('desired_salary');
			$photo = $this->input->post('photo');
			$resume_file = $this->input->post('resume_file');
			$user_id = decrypt($this->session->userdata('user_id'));
			$package_id = '';
			$posted = dateDb();
			
			$category_array = '';
				foreach($category as $category2){
					$category_array .= $category2.',';
				}
			$category_len = strlen($category_array);
			$categories = substr($category_array,0,$category_len-1);
			
			$occupation_array = '';
				foreach($occupation as $occupation2){
					$occupation_array .= $occupation2.',';
				}
			$occupation_len = strlen($occupation_array);
			$occupations = substr($occupation_array,0,$occupation_len-1);
			
			$type_array = '';
				foreach($type as $type2) {
					$type_array .= $type2.',';
				}
			$type_len = strlen($type_array);	
			$types = substr($type_array,0,$type_len-1);
			
			
			$set = array(
						'number' => $number,
						'title' => $title,
						'category' => $categories,
						'occupation' => $occupations,
						'type' => $types,						
						'objective' => $objective,
						'skills' => $skills,
						'province' => $province,
						'city' => $city,
						'zipcode' => $zipcode,
						'desired_salary' => $desired_salary,
						'photo' => $photo,
						'resume_file' => $resume_file,
						'user_id' => $user_id,
						'package_id' => $package_id,
						'posted' => $posted,
						'isactive' => 1
 						);
			$table = 'resume';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}				
	
	}
	
	public function cvupload() {
		$data['main_content'] = 'jobseeker/cvupload_v';
		$this->template->write_view('content','jobseeker/cvupload_v', $data);
		$this->template->render();
	}
	
	public function uploadNow() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
		$this->form_validation->set_rules('attach_cv', 'Attach your CV', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'job_title' => form_error('job_title', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'attach_cv' => form_error('attach_cv', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')									
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
		
		}
		
=======
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	}
	
	public function resume() {
		$data['main_content'] = 'jobseeker/resume_list';
<<<<<<< HEAD
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['resumes'] = $this->active_record->msrwhere(
								'resume', array('user_id' => $user_id, 'isactive' => 1), 
								'resume_id', 'desc')->result();
														
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','jobseeker/resume_list', $data);
		$this->template->render();
	}
	
	public function editresume() {
		$data['main_content'] = 'jobseeker/edit_resume';
<<<<<<< HEAD
		$resume_id = $this->uri->segment(3);
		$data['resume'] = $this->active_record->msrwhere(
								'resume', array('resume_id' => $resume_id, 
								'isactive' => 1), 'resume_id', 'desc')->row();
		
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','jobseeker/edit_resume', $data);
		$this->template->render();
	}
	
	public function updateResume() {
<<<<<<< HEAD
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('objective', 'Objective', 'trim|required');
		$this->form_validation->set_rules('skills', 'Skills', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');	
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'title' => form_error('title', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'category' => form_error('category', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'objective' => form_error('objective', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'skills' => form_error('skills', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')										
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$resume_id = decrypt($this->input->post('resume_id'));
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$objective = $this->input->post('objective');
			$skills = $this->input->post('skills');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$zipcode = $this->input->post('zipcode');
			$desired_salary = $this->input->post('desired_salary');
			$photo = $this->input->post('photo');
			$resume_file = $this->input->post('resume_file');
			$user_id = decrypt($this->session->userdata('user_id'));
			$package_id = '';
			$modified = dateDb();
			
			$set = array(
						'title' => $title,
						'category' => $category,
						'objective' => $objective,
						'skills' => $skills,
						'province' => $province,
						'city' => $city,
						'zipcode' => $zipcode,
						'desired_salary' => $desired_salary,
						'photo' => $photo,
						'resume_file' => $resume_file,
						'user_id' => $user_id,
						'package_id' => $package_id,
						'modified' => $modified
 						);
			$table = 'resume';
			$this->active_record->edit($table, $set, 'resume_id');
			$data['response'] = 'success';
			echo json_encode($data);		
		}	
=======
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	}
	
	public function application() {
		$data['main_content'] = 'jobseeker/application_v';
<<<<<<< HEAD
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['applications'] = $this->active_record->msrwhere(
									'application', array('user_id' => $user_id, 
									'isactive' => 1), 'application_id', 
									'desc')->result();
		
=======
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','jobseeker/application_v', $data);
		$this->template->render();			
	}
	
	public function addjobalert() {
		$data['main_content'] = 'jobseeker/addjob_alert';
		$this->template->write_view('content','jobseeker/addjob_alert', $data);
		$this->template->render();
	}
	
	public function saveJobalert() {
	
	}
		
	public function jobalert() {
		$data['main_content'] = 'jobseeker/job_alert';
		$this->template->write_view('content','jobseeker/job_alert', $data);
		$this->template->render();
	}
	
	public function editjobalert() {
		$data['main_content'] = 'jobseeker/editjob_alert';
		$this->template->write_view('content','jobseeker/editjob_alert', $data);
		$this->template->render();
	}
	
	public function updateJobalert(){
	
	}
	
<<<<<<< HEAD
	public function package() {
		$data['main_content'] = 'package/package_jobseeker';
		$data['packages'] = $this->active_record->msrwhere(
								'package', array('level_id' => 2), 
								'package_id', 'asc')->result();
								
		$user_id = decrypt($this->session->userdata('user_id'));						
		$checktrans = $this->active_record->msrwhere(
								'transaction', array('user_id' => $user_id), 
								'transaction_id', 'desc')->result();
										
		$this->template->write_view('content','package/package_jobseeker', $data);
		$this->template->render();
	}		
	
	public function choosePackage() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('package', 'Package', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'package' => form_error('package', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')									
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$package_id = $this->input->post('package_id');
			$user_id = decrypt($this->session->userdata('level_id'));
			$level_id = $this->session->userdata('level_id');
			$price = '';
			$tax = 0.1 * $price;
			$total = $price + $tax;
			
			$set = array(
						'user_id' => $user_id,
						'level_id' => $level_id,
						'package_id' => $package_id,
						'slot' => $ $slot,
						'price' => $price,
						'date' => dateDb()
						);
			$table = 'transaction';
			$this->active_record->save($table, $set);
			$transaction = $this->active_record->msrwhere($table, $set, 'transaction_id', 'desc')->row();
			$transaction_id = $transaction->transaction_id;
			
			$set1 = array(
						'no_payment' => $nopayment,
						'user_id' => $user_id,
						'package_id' => $package_id,
						'transaction_id' => $transaction_id,
						'payment_date' => dateDb(),
						'price' => $price,
						'tax' => $tax,
						'total' => $total,
						'status' => 'UNPAID',
						'isactive' => 1
						);
			$table1 = 'payment';
			$this->active_record->save($table1, $set1);
			$payment = $this->active_record->msrwhere($table1, $set1, 'payment_id', 'desc')->row();
			$payment_id = $payment->payment_id;
			
			$set2 = array(
						'no_invoice' => $noinvoice,
						'user_id' => $user_id,
						'package_id' => $package_id,
						'transaction_id' => $transaction_id,
						'invoice_date' => dateDb(),
						'total' => $total,
						'payment_id' => $payment_id,
						'status' => 'UNPAID',
						'isactive' => 1
						);			
			$table2 = 'invoice';
			$invoice = $this->active_record->save($table2, $set2);
			
			$data['responses'] = 'success';
			$data['redirect'] = 'jobseeker/postresume';
			echo json_encode($data);		
		}		
	}
	
	public function applyJob() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('resume', 'Resume', 'trim|required');
		$this->form_validation->set_rules('education', 'Education', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'resume' => form_error('resume', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')									  									
						);
			$data['message'] = $attr;
			echo json_encode($data);			
		}
		else {
			$job_id = $this->input->post('job_id');
			$user_id = decrypt($this->session->userdata('user_id'));
			$resume_id = $this->input->post('resume');			
			$date_applied = '';
			$job_title = $this->input->post('job_title');
			$attachment = $this->input->post('attachment');	
			$cover_letter = $this->input->post('cover_letter');			
			$posted = dateDb();
			
			$set = array(
						'job_id' => $job_id,
						'user_id' => $user_id,
						'resume_id' => $resume_id,
						'date_applied' => $date_applied,
						'job_title' => $job_title,
						'attachment' => $attachment,
						'cover_letter' => $cover_letter,						
						'posted' => $posted
						);
			$table = 'application';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);
		}
		
	}
		
	public function changepassword() {
		$data['main_content'] = 'jobseeker/reset_pass';
		/*$data['user'] = $this->active_record->msrwhere(
							'user', array('' => ''), 
							'user_id', 'desc')->row();*/
		
=======
	public function changepassword() {
		$data['main_content'] = 'jobseeker/reset_pass';
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
		$this->template->write_view('content','jobseeker/reset_pass', $data);
		$this->template->render();
	}
	
	public function savePassword() {
	
	}
<<<<<<< HEAD
	
	public function testimonial() {
		$data['main_content'] = 'testimonial/jobseeker_v';
		$this->template->write_view('content','testimonial/jobseeker_v', $data);
		$this->template->render();
	}
		
	public function submitTestimonial() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'content' => form_error('content', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')										  
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$email = decrypt($this->session->userdata('email'));
			$user_id = decrypt($this->session->userdata('user_id'));
			$content = $this->input->post('content');
			$posted = dateDb();
			$status = 'UNPUBLISH';
			$isactive = 1;
			
			$set = array(
						'email' => $email,
						'user_id' => $user_id,
						'content' => $content,
						'posted' => $posted,
						'status' => $status,
						'isactive' => $isactive
						);
			$table = 'testimonial';
			$this->active_record->save($table, $set);
			$data['responses'] = 'success';
			echo json_encode($data);		
		}
	}
	
	
	public function support() {
		$data['main_content'] = 'support/jobseeker_v';
		$this->template->write_view('content','support/jobseeker_v', $data);
		$this->template->render();	
	}
	
	public function submitTicket() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'question' => form_error('question', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$email = decrypt($this->session->userdata('email'));
			$user_id = decrypt($this->session->userdata('user_id'));
			$question = $this->input->post('question');
			$posted = dateDb();
			$status = '';
			$isactive = 1;
			
			$set = array(
						'email' => $email,
						'user_id' => $user_id,
						'question' => $question,
						'posted' => $posted,
						'status' => $status,
						'isactive' => $isactive
						);
			$table = 'support';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);
		}		
	}
	
	
	public function logout() {
		$this->session->sess_destroy();
		$direct = root();
		redirect($direct);
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
=======
		
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}