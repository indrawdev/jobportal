<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Email_mod extends CI_Model {
	
<<<<<<< HEAD
	
	public function sendEmail($from, $to, $subject, $content) {
		
		$config = array(
                       	'protocol' => 'smtp',
                        'smtp_crypto' => 'ssl',
						'smtp_host' => 'smtp.gmail.com',
						'smtp_user' => 'info@kerjakita.com',
						'smtp_pass' => 'jobportalindo',
						'smtp_port' => 465,
						'mailtype' => 'html',
						'smtp_timeout' => 30, 
						'charset' => 'iso-8859-1'
					);
		$this->load->library('email', $config);
		$this->email->set_crlf("\r\n");
        $this->email->set_newline("\r\n");
        $this->email->from("info@kerjakita.com", "KerjaKita.com");
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($content);
		
		if ($this->email->send()) {
            return true;
        }
		else {
			return false;
		}
		
		return false;
		
	}
	
	
	public function sendAccountEmail($user_id) {
	
		$account = $this->active_record->msrwhere(
							'user', array('user_id' => $user_id), 
							'user_id', 'asc')->row();
							
		$data['output_account'] = $account;
		$html = $this->load->view('email/account_v');
		$user = $this->active_record->msrwhere(
							'user', array('user_id' => $account->user_id), 
							'user_id', 'asc')->row();
							
		$to = $user->email;
		$from = 'info@kerjakita.com';
		$subject = 'Account Information';
		$content = $html;
		$success = $this->email_mod->sendEmail($from, $to, $subject, $content);
		
		if ($success) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function sendPaymentEmail($payment_id) {
	
		$payment = $this->active_record->msrwhere(
							'payment', array('payment_id' => $payment_id), 
							'payment_id', 'asc')->row();
							
		$data['output_account'] = $payment;
		$html = $this->load->view('email/payment_v');
		$user = $this->active_record->msrwhere(
							'user', array('user_id' => $payment->user_id), 
							'user_id', 'asc')->row();
							
		$to = $user->email;
		$from = 'info@kerjakita.com';
		$subject = 'Payment Information';
		$content = $html;
		$success = $this->email_mod->sendEmail($from, $to, $subject, $content);
		
		if ($success) {
			return true;
		}
		else {
			return false;
		}		
	}
	
	public function sendInvoiceEmail($invoice_id) {
		
		$invoice = $this->active_record->msrwhere(
							'invoice', array('invoice_id' => $invoice_id), 
							'invoice_id', 'asc')->row();
							
		$data['output_invoice'] = $invoice;
		$html = $this->load->view('email/invoice_v');
		$user = $this->active_record->msrwhere(
							'user', array('user_id' => $invoice->user_id), 
							'user_id', 'asc')->row();
							
		$to = $user->email;
		$from = 'info@kerjakita.com';
		$subject = 'Invoice Information';
		$content = $html;
		$success = $this->email_mod->sendEmail($from, $to, $subject, $content);
		
		if ($success) {
			return true;
		}
		else {
			return false;
		}	
=======
	public function sendEmail() {
	
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	}

}