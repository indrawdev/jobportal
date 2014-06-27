<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Blaster_mod extends CI_Model {

	public function blastEmail($from, $to, $subject, $content) {
	
		$config = array(
                       	'protocol' => 'smtp',
                        'smtp_crypto' => '',
						'smtp_host' => '',
						'smtp_user' => '',
						'smtp_pass' => '',
						'smtp_port' => 465,
						'mailtype' => 'html',
						'smtp_timeout' => 30, 
						'charset' => 'iso-8859-1'
					);
		$this->load->library('email', $config);
		$this->email->set_crlf("\r\n");
        $this->email->set_newline("\r\n");
        $this->email->from($from);
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
}