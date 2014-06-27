<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('active_record');
		$this->load->model('email_mod');
		//$this->load->driver('session');
		$this->load->helper('captcha');
	}

	public function index() {
	
		$data['main_content'] = 'contact_v';
		$data['levels'] = $this->active_record->msr(
							'level', 'level_id', 
							'asc')->result();		
											
		$this->template->write_view('content','contact_v', $data);
		$this->template->render();
	}
	
	public function prova(){
        
		$this->load->library('captcha');
        $this->load->library('validation');
        $rules['user'] = "required";
        $rules['captcha'] = "required|callback_captcha_check";
        $this->validation->set_rules($rules);

        $fields['user']    = 'Username';
        $fields['captcha']    = 'codice';
        $this->validation->set_fields($fields);
        if ($this->validation->run() == FALSE) {
            $expiration = time()-300; // Two hour limit
            $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
            $vals = array(
                        //'word'         => 'Random word',
                        'img_path'     => './uploads/',
                        'img_url'     => base_url().'uploads/',
                        'font_path'     => './system/fonts/texb.ttf',
                        'img_width'     => '100',
                        'img_height' => '30',
                        'expiration' => '3600'
                    );
            $cap = $this->captcha->create_captcha($vals);
            //
            $data['image']= $cap['image'];
            //mette nel db
            $data = array(
                        'captcha_id'    => '',
                        'captcha_time'    => $cap['time'],
                        'ip_address'    => $this->input->ip_address(),
                        'word'            => $cap['word']
                    );

            $query = $this->db->insert_string('captcha', $data);
            $this->db->query($query);
            $this->load->view('captcha',$data);
        }
		
		else{
            echo "OK";
        }
    }

    public function captcha_check() {
            // Then see if a captcha exists:
            $exp=time()-600;
            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
            $binds = array($this->input->post('captcha'), $this->input->ip_address(), $exp);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();

            if ($row->count == 0) {
                $this->validation->set_message('_captcha_check', 'Codice di controllo non valido');
                return FALSE;
            }
			else {
                return TRUE;
            }

    }
	
	public function submitMessage() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('level', 'Who are You', 'trim|required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['response'] = 'failed';
			$attr = array(
							'name' => form_error('name', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'subject' => form_error('subject', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'phone' => form_error('phone', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),									
							'email' => form_error('email', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),
							'level' => form_error('level', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>'),										
							'message' => form_error('message', '<div class="alert alert-error fade in">
                                          <a class="close" data-dismiss="alert" href="#">x</a>','</div>')
						);
										  
			$data['message'] = $attr;
			echo json_encode($data);							  									    	  										
		
		}
		else {
		
			$name = $this->input->post('name');
			$subject = $this->input->post('subject');
			$phone = $this->input->post('phone');
			$level_id = decrypt($this->input->post('level'));
			$message = $this->input->post('message');
			$posted = dateDb();
			$status = 'UNREAD';
								
			$set = array(
						'name' => $name,
						'subject' => $subject,
						'phone' => $phone,
						'level_id' => $level_id,					
						'message' => $message,
						'posted' => $posted,
						'status' => $status,
						'isactive' => 1
						);
			$table = 'contact';
			$this->active_record->save($table, $set);
			$data['response'] = 'success';
			echo json_encode($data);
		}
		
	}

}