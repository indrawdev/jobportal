<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Upload_mod extends CI_Model {
	
<<<<<<< HEAD
	function __construct() {
		parent::__construct();
		$this->load->library('upload');
	}
	
	public function uploadImage($path, $filename) {
			
		$config = array(
						'allowed_types' => 'jpg|jpeg|png|gif',
						'upload_path' => $path,
						'max_size' => 1000,
						'max_width' => 1024,
						'max_height' => 768,
						'file_name' => $filename,
						'overwrite' => TRUE,
						'encrypt_name' => TRUE,
						'remove_spaces' => TRUE						
						);
		$this->load->library('upload', $config);
		$this->upload->uploadImage();
		
		$config = array(
						'image_library' => 'gd2',
						'source_image' => '',
						'new_image' => '',
						'maintain_ration' => TRUE,
						'width' => '100',
						'height' => '100'
						);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();	
		
		$config = array(
						'wm_text' => 'KerjaKita',
						'wm_type' => 'text',
						'wm_font_path' => './system/fonts/texb.ttf',
						'wm_font_size' => '16',
						'wm_font_color' => 'ffffff',
						'wm_vrt_alignment' => 'bottom',
						'wm_hor_alignment' => 'center',
						'wm_padding' => '20'
						);
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();							
	}
	
	public function uploadFile($path, $filename) {
		
		$config = array(
						'upload_path' => $path,
						'allowed_types' => 'doc|docx|pdf',
						'max_size' => '500',
						'file_name' => $filename,
						'overwrite' => TRUE,
						'encrypt_name' => TRUE,
						'remove_spaces' => TRUE
						);

		$this->load->library('upload', $config);
		$this->upload->uploadFile();
		
		if (!$this->upload->uploadFile()) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);
		}
	}
	
=======

	public function uploadImage() {
	
	}
	
	public function uploadCV() {
	
	}

>>>>>>> 31ee3d139fbb0c2633ae4d66276a4d8f2bc3bfff
}