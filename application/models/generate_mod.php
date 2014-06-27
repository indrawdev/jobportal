<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Generate_mod extends CI_Model {

<<<<<<< HEAD
	
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
=======
	public function generatePass() {
	
	}
	
	public function idJob() {
	
>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
	}
	
	public function idResume() {
	
	}
	
	public function noPayment() {
	
	}
		
	public function noInvoice() {
	
	}
<<<<<<< HEAD
    
	public function randomCode() {
		$random = substr(number_format(time() * rand(),0,'',''),0,7);
		return $random;	
	}
=======
	

>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}