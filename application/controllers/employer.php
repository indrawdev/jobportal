<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		$this->load->model('generate_mod');
		
		if($this->session->userdata('login') != TRUE || $this->session->userdata('level_id') != 1) {
			$direct = root().'login';
			redirect($direct);
		}
		
	}

	public function index() {
		$data['main_content'] = 'employer/employer_v';
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['user'] = $this->active_record->msrwhere(
								'user', array('user_id' => $user_id, 'level_id' => 1), 
								'user_id', 'desc')->row();
		
		$this->template->write_view('content','employer/employer_v', $data);
		$this->template->render();
	}
		
	public function account() {
		$data['main_content'] = 'employer/employer_account';
		$employer_id = decrypt($this->session->userdata('employer_id'));
		$data['account'] = $this->active_record->msrwhere(
								'employer', array('employer_id' => $employer_id), 
								'employer_id', 'desc')->row();
		
		$data['provinces'] = $this->active_record->msr(
								'province', 'province_id', 
								'asc')->result();
		
		$data['cities'] = $this->active_record->msr(
								'city', 'city_id', 
								'asc')->result();
													
		$this->template->write_view('content','employer/employer_account', $data);
		$this->template->render();
	}
	
	public function updateAccount() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');				
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('company_desc', 'Company Description', 'trim|required');
		$this->form_validation->set_rules('logo', 'Company Logo', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'company_name' => form_error('company_name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'contact_name' => form_error('contact_name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'), 
							'city' => form_error('city', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'address' => form_error('address', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),  								
							'phone_number' => form_error('phone_number', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'company_desc' => form_error('company_desc', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'logo' => form_error('logo', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')			  
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$employer_id = decrypt($this->session->userdata('employer_id'));
			$user_id = decrypt($this->session->userdata('level_id'));
			$company_name = $this->input->post('company_name');
			$contact_name = $this->input->post('contact_name');
			$website = $this->input->post('website');
			$province_id = $this->input->post('province');
			$city_id = $this->input->post('city');
			$address = $this->input->post('address');
			$zipcode = $this->input->post('zipcode');
			$phone_number = $this->input->post('phone_number');
			$company_desc = $this->input->post('company_desc');
			$logo = $this->input->post('logo');
			$modified = dateDb();
			
			$set = array(
						'user_id' => $user_id,
						'company_name' => $company_name,
						'contact_name' => $contact_name,
						'website' => $website,
						'province_id' => $province_id,
						'city_id' => $city_id,
						'address' => $address,
						'zipcode' => $zipcode,
						'phone_number' => $phone_number,
						'company_description'  => $company_desc,
						'logo' => $logo,
						'modified' => $modified
						);
			$table = 'employer';
			$this->active_record->edit($table, $set, 'employer_id', $employer_id);
			$data['response'] = 'success';
			echo json_encode($data);		
		}
	}
	
	public function checkPackage() {
		$user_id = decrypt($this->session->userdata('user_id'));
		$check = $this->active_record->msrwhere(
									'transaction', array('user_id' => $user_id), 
									'transaction_id', 'asc')->result();
									
		/*if (count($check == 0)) {
				$direct = root().'employer/postjob';
				redirect($direct);
		}
		else if (count($check > 2)) {
				$direct = root().'employer/package';
				redirect($direct);
		}
		else if (count($check > 10)) {
				$direct = root().'employer/package';
				redirect($direct);		
		}
		else if (count($check > 50)) {
				$direct = root().'employer/package';
				redirect($direct);	
		
		}*/
		
	}
	
	
	public function postjob() {
			$user_id = decrypt($this->session->userdata('user_id'));
			$transaction = $this->active_record->msrwhere(
									'transaction', array('user_id' => $user_id), 
									'transaction_id', 'desc')->row();
			if ($transaction->slot <= 2) {
			$data['main_content'] = 'employer/post_job';
			
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
											
			$this->template->write_view('content','employer/post_job', $data);
			$this->template->render();			
			}
			else if ($transaction->slot <= 10) {
					$direct = root().'employer/package';
					redirect($direct);
			}								
	}
	
	public function saveJob() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('occupations', 'Occupations', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('jobdesc', 'Job Description', 'trim|required');	
		$this->form_validation->set_rules('requirements', 'Job Requirements', 'trim|required');	
		$this->form_validation->set_rules('salary', 'Salary', 'trim|required');	
		$this->form_validation->set_rules('province', 'Province', 'trim|required');	
		$this->form_validation->set_rules('city', 'City', 'trim|required');	
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
				
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
							'jobdesc' => form_error('jobdesc', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'requirements' => form_error('requirements', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'salary' => form_error('salary', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'city' => form_error('city', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'email' => form_error('email', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										  
						);
			$data['message'] = $attr;
			echo json_encode($data);				
		}
		else {	
			
			//$number = $this->generate_mod->idJob();
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$occupation = $this->input->post('occupation');
			$type = $this->input->post('type');
			$jobdesc = $this->input->post('jobdesc');
			$requirements = $this->input->post('requirements');
			$salary = $this->input->post('salary');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$zipcode = $this->input->post('zipcode');
			$email = $this->input->post('email');
			$url = $this->input->post('url');
			$user_id = decrypt($this->session->userdata('user_id'));
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
						'occupations' => $occupations,
						'type' => $types,
						'jobdesc' => $jobdesc,
						'requirements' => $requirements,
						'salary' => $salary,
						'province' => $province,
						'city' => $city,
						'zipcode' => $zipcode,
						'email' => $email,
						'url' => $url,
						'user_id' => $user_id,
						'posted' => $posted,
						'isactive' => 0
						);
			$table = 'job';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);			
		}	
																			
	}
	
	public function joblist() {
		$data['main_content'] = 'employer/job_list';
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['jobs'] = $this->active_record->msrwhere(
								'job', array('user_id' => $user_id, 
								'isactive' => 1), 'job_id', 'desc')->result();
		
		$this->template->write_view('content','employer/job_list', $data);
		$this->template->render();			
	}
	
	public function editjob() {
		$data['main_content'] = 'employer/edit_job';
		$job_id = $this->uri->segment(3);
		$data['job'] = $this->active_record->msrwhere(
								'job', array('job_id' => $job_id, 
								'isactive' => 1), 'job_id')->row();
													
		$this->template->write_view('content','employer/edit_job', $data);
		$this->template->render();			
	}
	
	public function updateJob() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('title', 'Job Title', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('occupations', 'Occupations', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('requirement', 'Requirement', 'trim|required');
		$this->form_validation->set_rules('salary', 'Salary', 'trim|required');						
		$this->form_validation->set_rules('province', 'Province', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		
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
							'requirement' => form_error('requirement', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),  								
							'salary' => form_error('salary', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'province' => form_error('province', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),  								
							'city' => form_error('city', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);	
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$job_id = decrypt($this->input->post('job_id'));
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$occupations = $this->input->post('occupations');
			$type = $this->input->post('type');
			$requirement = $this->input->post('requirement');
			$salary_id = $this->input->post('salary');
			$province_id = $this->input->post('province');
			$city_id = $this->input->post('city');
			$zipcode = $this->input->post('zipcode');
			$email = $this->input->post('email');
			$url = $this->input->post('url');
			$user_id = decrypt($this->session->userdata('user_id'));
			$pacakage_id = '';
			$modified = dateDb();
			
			$set = array(
						'job_id' => $job_id,
						'title' => $title,
						'category' => $category,
						'occupations' => $occupations,
						'type' => $type,
						'requirement' => $requirement,
						'salary_id' => $salary_id,
						'province_id' => $province_id,
						'city_id' => $city_id,
						'zipcode' => $zipcode,
						'email' => $email,
						'url' => $url,
						'user_id' => $user_id,
						'pacakage_id' => $pacakage_id,
						'modified' => $modified,
						'isactive' => 1
						);
			$table = 'job';
			$this->active_record->edit($table, $set, 'job_id', $job_id);
			$data['response'] = 'success';
			echo json_encode($data);		
		}
	}
	
	public function application() {
		$data['main_content'] = 'employer/application_v';
		$employer_id = decrypt($this->session->userdata('employer_id'));
		
		$data['applications'] = $this->active_record->msrwhere(
							'application', array('employer_id' => $employer_id, 
							'isactive' => 1), 'application_id', 'desc')->result();
							
		$this->template->write_view('content','employer/application_v', $data);
		$this->template->render();			
	}
	
	public function viewApplication() {
		$application_id = $this->uri->segment(3);
		$data['application'] = $this->active_record->msrwhere(
							'application', array('application' => $application_id), 
							'application_id', 'desc')->row();
							
	}
	
	public function addresumealert() {
		$data['main_content'] = 'employer/addresume_alert';
		$this->template->write_view('content','employer/addresume_alert', $data);
		$this->template->render();
	}
			
	public function saveResumealert() {
		
	
	}
	
	public function resumealert() {
		$data['main_content'] = 'employer/resume_alert';
		$this->template->write_view('content','employer/resume_alert', $data);
		$this->template->render();
	}
	
	public function editresumealert() {
		$data['main_content'] = 'employer/editresume_alert';
		$this->template->write_view('content','employer/editresume_alert', $data);
		$this->template->render();
	}		
	
	public function updateResumealert() {
	
	}
	
	public function package() {
		$data['main_content'] = 'package/package_employer';
		$data['packages'] = $this->active_record->msrwhere(
								'package', array('level_id' => 1), 
								'package_id', 'asc')->result();
		$user_id = decrypt($this->session->userdata('user_id'));
		
		$checktrans = $this->active_record->msrwhere(
								'transaction', array('user_id' => $user_id), 
								'transaction_id', 'desc')->result();
														 
		$this->template->write_view('content','package/package_employer', $data);
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
			$user_id = decrypt($this->session->userdata('user_id'));
			$package_id = $this->input->post('package_id');
			$slot = $this->input->post('slot');
			$price = $this->input->post('price');
			$tax = 0.1 * $price;
			$total = $price + $tax;
			
			$set = array(
						'user_id' => $user_id,
						'package_id' => $package_id,
						'slot' => $slot,
						'price' => $price,
						'date' => dateDb(),			
						);
			$table = 'transaction';
			$this->active_record->save($table, $set);
			$transaction = $this->active_record->msrwhere($table, $set, 'transaction_id', 'desc')->row();
			$transaction_id = $transaction->transaction_id;
			
			$set1 = array(
						'no_payment' => $nopayment,
						'user_id' => $user_id,
						'package_id' => $package_id,
						'payment_date' => dateDb(),
						'price' => $price,
						'tax' => $tax,
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
						'invoice_date' => dateDb(),
						'total' => $total,
						'payment_id' => $payment_id,
						'status' => 'UNPAID',
						'isactive' => 1
						);
			$table2 = 'invoice';
			$invoice = $this->active_record->save($table2, $set2);
		
			$data['responses'] = 'success';
			echo json_encode($data);		
		}		
	}
				
	public function changepassword() {
		$data['main_content'] = 'employer/reset_pass';
		
		$this->template->write_view('content','employer/reset_pass', $data);
		$this->template->render();
	}
	
	public function savePassword() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required');
		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
						'new_pass' => form_error('new_pass', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
						'confirm_pass' => form_error('confirm_pass', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$user_id = decrypt($this->session->userdata('user_id'));
			$new_pass = $this->input->post('new');
			$confirm_pass = $this->input->post('confirm');
			
			$set = array(
						'password' => $new_pass
						);
			$table = 'user';
			$this->active_record->edit($table, $set, 'user_id', $user_id);
			$data['responses'] = 'success';
			echo json_encode($data);
		}
	}

	public function testimonial() {
		$data['main_content'] = 'testimonial/employer_v';
		$this->template->write_view('content','testimonial/employer_v', $data);
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
			
			$set = array(
						'email' => $email,
						'user_id' => $user_id,
						'content' => $content,
						'posted' => $posted,
						'status' => $status,
						'isactive' => 1
						);
			$table = 'testimonial';
			$this->active_record->save($table, $set);
			$data['responses'] = 'success';
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
}