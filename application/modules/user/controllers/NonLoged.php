<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NonLoged extends Login_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	
	// Check email 
	public function email_check(){
	
		// table name
		$table_name = 'user';
		
		$check_username = array(
			'email'=>$this->input->post('email')
		);
		
		// email check for signup
		$checkValue1 = $this->common->getRecordCount($table_name, $check_username);
		
		if($checkValue1) {  
			echo 1;
		} else {
			echo 0;
		}
	}
	
	// Signup form and save data
	public function sign_up(){
		
		if(!empty($this->input->post())){
			
			// table name
			$table_name = 'user';
			
			// user has submitted anything yet!	
			$data = array(
				'country'=>$this->input->post('country'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'firstname' => $this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'password'=>md5($this->input->post('password')),
				'phone'=>$this->input->post('phone'),
				'created_at'=>date('Y-m-d')
			);
			
			$response = $this->common->saveRecord($table_name, $data);
			
			if(!empty($response)){
				
				$email = $this->input->post('email');
				$subject = 'Welcome to Hubway';
				$from = 'Hubway';			
				if($this->input->post('email')){

					$data	='';
					$this->load->library('email');
					$to = $email;
					$subject 	= 'Welcome to Hubway';
					$message    =  $this->load->view('welcomeEmailTemplete',$data, true);
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					$headers .= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
					$headers .= 'Reply-To: Hubway@Hubway.com' . "\r\n";
					mail($to,$subject,$message,$headers);

				}
				
				$this->session->set_flashdata('messagePr', 'Your signup is successful.Plsase login');
				redirect( base_url().'user/NonLoged/thank', 'refresh');
			
			}else{
				
				$this->session->set_flashdata('check_signup', 'Your signup failed try again later');
				redirect( base_url() , 'refresh');
			}	
			
		} else {
			
			// user hasen't submitted anything yet!
			$this->session->set_flashdata('empty_data', 'Your signup failed try again later');
            redirect( base_url(), 'refresh');
		}
		
	}
	
	
	// Thanks page for success
	public function thank(){
		$this->layout->title('Thanks | Hubway');
		$this->layout->view('thanks');
	}
	
}
