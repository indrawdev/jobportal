<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/third_party/tcpdf/tcpdf.php';
 
class Pdf extends TCPDF {
	var  $tpl_header;
	
	function setHeaderData($header_data = NULL) {
		if($header_data !=NULL) {
			$this->tpl_header = $header_data;
		}
	}
	
	public function Header() {
		$this->writeHTML($this->tpl_header, true, 0, true, 0);
	}

}