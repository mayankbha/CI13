<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LogedController extends Login_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	
	// check login function 
	public function login(){
		
		// table name
		$table_name = 'user';
		
		$check_login = array(
			'email'=>$this->input->post('email')
		);
		
		// email check for login
		$check_email = $this->common->getSingleRecord($table_name, $check_login);

		if($check_email){
				
			// check password 
			if($check_email->password == md5($this->input->post('password'))){
				
				// create session 				
				$user_session = array(
					'id' => $check_email->id,
					'firstname' => $check_email->firstname,
					'lastname' => $check_email->lastname,
					'email' => $check_email->email,
					'logged_in' => TRUE
				);

				$this->session->set_userdata('user_session', $user_session);

				$this->session->set_flashdata('messagePr', 'Your login is successfully.');

				redirect( base_url().'dashboard/Dashboard', 'refresh');
			} else {
				
				$this->session->set_flashdata('password_check', 'Your password not match !');
				redirect( base_url(), 'refresh');
			}
		}else{
			
			$this->session->set_flashdata('email_password_check', 'Your email and password not match !');
			redirect( base_url(), 'refresh');
		}
	}

	// check email for forget password
	public function forgetPassword(){
		
		$table_name = "user";
		$data = $this->input->post();
		
		$check_email = array(
			'email'=>$this->input->post('email')
		);
		
		// email check for forget password
		$check_email = $this->common->getSingleRecord($table_name, $check_email);
		
		if(isset($check_email->email)){
			
			$table_forget_name = "forgetpassword";
			$email = array(
				'email' => $check_email->email
			);
			
			// email check on forget password table
			$forget_email_check = $this->common->getSingleRecord($table_forget_name, $email);
			
			if(isset($forget_email_check->email)){
				
				$token_id 			= sha1(uniqid($forget_email_check->email, true));
				$time 				= date("h:i:s");
				$timestamp_two_hour_later = (strtotime($time)+7200);
			
				$f_email = array(
					'email' => $forget_email_check->email
				);
				
				$data = array(
					'token_id'=> $token_id,
					'used'=> $timestamp_two_hour_later
				);
				
				$response = $this->common->updateRecord($table_forget_name, $data, $f_email);
		
				
				
				$email		= $forget_email_check->email;
					
				$subject 	= 'Change Password for Hubway';
				
				$from 		= 'Hubway';			
				
				if($email){
   
					$data["change_password_url"]	= base_url() .'user/LogedController/changepassword/'.$token_id;
					$this->load->library('email');
					$to = $email;
					$subject 	= 'Change Password for Hubway';
					$message    =  $this->load->view('changePasswordEmailTemplete',$data, true);
					$headers 	= "MIME-Version: 1.0" . "\r\n"; 
					$headers 	.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					$headers 	.= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
					$headers 	.= 'Reply-To: Hubway@Hubway.com' . "\r\n";
					mail($to,$subject,$message,$headers);

				}
				
				$this->session->set_flashdata('send_link_signup', 'Your password link send your email');
				redirect( base_url() , 'refresh');
				
				
			} else {				
				
				@$token_id 			= sha1(uniqid($forget_email_check->email, true));
				$time 				= date("h:i:s");
				$timestamp_two_hour_later = (strtotime($time)+7200);
				
				$data = array(
					'email'=> $check_email->email,
					'token_id'=> $token_id,
					'used'=> $timestamp_two_hour_later
				);	
				
				$response = $this->common->saveRecord($table_forget_name, $data);
				
				$email_update = array(
					'token_id' => $token_id
				);
		
				// email check on forget password table
				$forget_email_update = $this->common->getSingleRecord($table_forget_name, $email_update);
				
				$email		= $forget_email_update->email;
					
				$subject 	= 'Change Password for Hubway';
				
				$from 		= 'Hubway';			
				
				if($email){

					$data["change_password_url"]	= base_url() .'user/LogedController/changepassword/'.$forget_email_update->token_id;
					$this->load->library('email');
					$to = $email;
					$subject 	= 'Change Password for Hubway';
					$message    =  $this->load->view('changePasswordEmailTemplete',$data, true);
					$headers 	= "MIME-Version: 1.0" . "\r\n";
					$headers 	.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					$headers 	.= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
					$headers 	.= 'Reply-To: Hubway@Hubway.com' . "\r\n";
					mail($to,$subject,$message,$headers);

				}
				
				$this->session->set_flashdata('send_link_signup', 'Your password link send your email');
				redirect( base_url() , 'refresh');
			
			}
			
			
		
		} else {
			
			
			$this->session->set_flashdata('email_not_exit', 'Your email not match');
            redirect( base_url(), 'refresh');
		}
	}
	
	// change password rediection
	public function changepassword($token_id = NULL){
		
		$table_forget_name = 'forgetpassword';

		
		
		$data = array(
			'token_id' => $token_id
		);
		
		$check_token = $this->common->getSingleRecord($table_forget_name, $data);
		
		@$email 			= $check_token->email;
		@$used_time	 		= $check_token->used;
		
		$used = date("h:i:s");
		$timestamp = strtotime($used);
	
		if($used_time == 1){
			

			$this->session->set_flashdata('user_token_message', 'Your token alerady user contact admin');
			redirect( base_url().'user/forgetpassword_expire_page' , 'refresh');
			
		} else if($timestamp <= $used_time){
			
			
		} else {
			
	
			$this->session->set_flashdata('expired_token_message', 'Your token expreid user contact admin');
			redirect( base_url().'user/forgetpassword_expire_page' , 'refresh');
		}
		
		$this->layout->title('Change Password | Hubway');
		$this->layout->view('change_password');
			
		
	}
	
	// change password
	public function update_change_password($token_id = NULL){
		
		$table_changepassword_name = "user";
		$table_tokenupdate_name = "forgetpassword";
			
		$data = array(
			'token_id' => $token_id
		);	
			
		$forget_email_check = $this->common->getSingleRecord($table_tokenupdate_name, $data);
		
		// user has submitted anything yet!	
		$change_password = array(
			'password'=> md5($this->input->post('password'))
		);
		
		
		$forget_email = array(
			'email' => $forget_email_check->email
		);
	
		
		$user_data = array(
			'used' => '1'
		);
		
		$forget_response = $this->common->updateRecord($table_changepassword_name, $change_password, $forget_email);
		$response = $this->common->updateRecord($table_tokenupdate_name, $user_data, $data);
		
		$this->session->set_flashdata('user_token_message', 'Your password change sucessfully');
		redirect( base_url() , 'refresh');
		
	}
	
	// forget error page 
	function forgetpassword_expire_page(){
		
		$this->layout->title('Forget password Expire | Hubway');
		$this->layout->view('forget_password_error');
		
	}
	
	// Logout user 
	function logout()
	{
		$user_session= array(
			'id' =>'',
			'firstname' =>'',
			'logged_in' => FALSE
		);

		$this->session->set_userdata('user_session', $user_session);				
		$this->session->unset_userdata($user_session);
		$this->session->sess_destroy();
		if($this->session->sess_destroy()){
			echo 1;
		}
		redirect( base_url(), 'refresh');
	}
}