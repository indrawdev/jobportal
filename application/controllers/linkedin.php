<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linkedin extends CI_Controller {

	public function login() {
		$this->load->library('linkedin');
		// Fill the keys and secrets you retrieved after registering your app
		$oauth = new OAuth("75kbefzkm2f21b", "OMQ7mHfVlf3UtSwE");
		$oauth->setToken("f56f04d0-72b9-463c-a20b-234fb53cb5bd", "b33cce71-e59e-48fd-bc01-b5cbc8f94f2b");
 
		$params = array();
		$headers = array();
		$method = OAUTH_HTTP_METHOD_GET;
  
		// Specify LinkedIn API endpoint to retrieve your own profile
		$url = "http://api.linkedin.com/v1/people/~?format=json";
		 
		// By default, the LinkedIn API responses are in XML format. If you prefer JSON, simply specify the format in your call
		// $url = "http://api.linkedin.com/v1/people/~?format=json";
		// Make call to LinkedIn to retrieve your own profile
		$oauth->fetch($url, $params, $method, $headers);
		echo $oauth->getLastResponse();
	}
	
	public function oauth() {
		$this->load->add_package('OAuth');
		
	}
	
	public function next_step(){
		$this->load->view('step_v'); 
	}
}