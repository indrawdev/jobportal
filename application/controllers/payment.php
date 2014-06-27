<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		
		if($this->session->userdata('login') != TRUE) {
			$direct = root().'login';
			redirect($direct);
		}
	}
	
	public function index() {
		$data['main_content'] = 'payment/payment_v';
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['payments'] = $this->active_record->msrwhere(
								'payment', array('user_id' => $user_id, 'isactive' => 1), 
								'payment_id', 'desc')->result();
								
		$this->template->write_view('content','payment/payment_v', $data);
		$this->template->render();
	}
	
	public function viewPayment() {
		$payment_id = $this->uri->segement(3);
		$data['payment'] = $this->active_record->msrwhere(
								'payment', array('payment_id' => $payment_id, 'isactive' => 1), 
								'payment_id', 'desc')->row();
								
		$this->load->view('detail_v', $data);
	}
	
	public function invoice() {
		$data['main_content'] = 'payment/invoice_v';
		$user_id = decrypt($this->session->userdata('user_id'));
		$data['invoices'] = $this->active_record->msrwhere(
								'invoice', array('user_id' => $user_id, 'isactive' => 1), 
								'invoice_id', 'desc')->result();
		$this->template->write_view('content','payment/invoice_v', $data);
		$this->template->render();
	}
	
	public function viewInvoice() {
		$invoice_id = $this->uri->segment(3);
		$user_id = $decrypt($this->session->userdata('user_id'));
		$data['invoice'] = $this->active_record->msrwhere(
									'invoice', array('invoice_id' => $invoice_id, 
									'user_id' => $user_id), 'invoice_id', 
									'desc')->row();
									
		$this->load->view('detailinvoice_v', $data);
	}
	
	/*
	public function downloadInvoice() {
		$this->load->helper(array('dompdf', 'file'));
		$invoice_id = '';
		$data['invoices'] = '';
		$file = '';
		$html = '';
		$data = pdf_create($html, '', false);
		write_file('name', $data);
	}
	*/
		
	public function confirmation() {
		$data['main_content'] = 'payment/confirmation_v';
		$data['methods'] = $this->active_record->msr(
							'transfer_method', 'transfer_method_id', 
							'asc')->result();
		
		$payment_id = $this->uri->segment(3);		
		$data['total'] = $this->active_record->msrwhere(
							'payment', array('payment_id' => $payment_id, 
							'isactive' => 1), 'payment_id', 
							'desc')->row();
							
		$data['banks'] = $this->active_record->msr(
							'bank', 'bank_id', 
							'asc')->result();
							
		$data['recs'] = $this->active_record->msr(
							'rec', 'rec_id', 
							'asc')->result();
													
		$this->template->write_view('content','payment/confirmation_v', $data);
		$this->template->render();
	}
	
	public function submitConfirmation() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('transfer_method', 'Transfer Method', 'trim|required');
		$this->form_validation->set_rules('total', 'Total', 'trim|required');
		$this->form_validation->set_rules('to_bank', 'To Bank', 'trim|required');
		$this->form_validation->set_rules('from_bank', 'From Bank', 'trim|required');
		$this->form_validation->set_rules('name', 'Your Name', 'trim|required');
		$this->form_validation->set_rules('account', 'Account Number', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'transfer_method' => form_error('transfer_method', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'total' => form_error('total', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'to_bank' => form_error('to_bank', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'from_bank' => form_error('from_bank', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'name' => form_error('name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'account' => form_error('account', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')																	
						);
			$data['message'] = $attr;
			echo json_encode($data);
		}
		else {
			$user_id = decrypt($this->session->userdata('user_id'));
			$transfer_method = decrypt($this->input->post('transfer_method'));
			$total = $this->input->post('total');
			$to_bank = decrypt($this->input->post('to_bank'));		
			$from_bank = decrypt($this->input->post('from_bank'));	
			$name = $this->input->post('name');
			$account = $this->input->post('account');
			$status = 'PENDING';			
			$when = dateDb();
			$payment_id = decrypt($this->input->post('payment_id'));
			$invoice_id = decrypt($this->input->post('invoice_id'));
			//$totalpay = str_replace(".","",explode(",",str_replace("Rp. ","",$total)));
			
			$set = array(
						'user_id' => $user_id,
						'transfer_method_id' => $transfer_method,
						'payment_id' => $payment_id,
						'invoice_id' => $invoice_id,
						'total' => $total,
						'to_bank_id' => $to_bank,
						'from_bank_id' => $from_bank,
						'name' => $name,
						'account' => $account,
						'status' => $status,						
						'when' => $when,
						'isactive' => 1
						);
			$table = 'confirmation';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);		
		}		
		
	}
		
}