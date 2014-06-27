<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Generate_mod extends CI_Model {

	
	public function idJob() {
		$date = date('d-m-Y');
		$resultByDate = $this->active_record->msrquery(
						"SELECT COUNT(*) cnt FROM job WHERE to_char(posted,'DD-MM-YYYY') = '".$date."'"
						)->row();
		$count = $resultByDate->cnt;
		$count++;
		$num = $count;
		$num_padded = sprintf("%05s", $num);			
		$jobNumber = $num_padded;
		return $jobNumber;
	}
	
	public function idResume() {
	
	}
	
	public function noPayment() {
	
	}
		
	public function noInvoice() {
	
	}
    
	public function randomCode() {
		$random = substr(number_format(time() * rand(),0,'',''),0,7);
		return $random;	
	}
}