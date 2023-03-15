<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Login_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	// Loading page and Admin
	public function index() {
	
		
		$this->layout->title('Admin | Hubway');
		$this->layout->view('login');
	}
	
	public function adminLogin(){
		// table name
		$table_name = 'admin';
		
		$check_login = array(
			'email'=>$this->input->post('email')
		);
		
		// email check for login
		$check_email = $this->common->getSingleRecord($table_name, $check_login);

		if($check_email){
				
			// check password 
			if($check_email->password == $this->input->post('password')){
				
				// create session 				
				$admin_session = array(
					'admin_id' => $check_email->admin_id,
					'email' => $check_email->email,
					'admin_in' => TRUE
				);

				$this->session->set_userdata('admin_session', $admin_session);

				$this->session->set_flashdata('messagePr', 'Your login is successfully.');

				redirect( base_url().'administrator/dashboard', 'refresh');
			} else {
				
				$this->session->set_flashdata('password_check', 'Your password not match !');
				redirect( base_url().'administrator/index', 'refresh');
			}
		}else{
			
			$this->session->set_flashdata('email_password_check', 'Your email and password not match !');
			redirect( base_url().'administrator/index', 'refresh');
		}
	}
	
	
	
	// Logout user 
	function logout()
	{
		$admin_session= array(
			'admin_id' =>'',
			'email' =>'',
			'admin_in' => FALSE
		);

		$this->session->set_userdata('admin_session', $admin_session);				
		$this->session->unset_userdata($admin_session);
		$this->session->sess_destroy();
		if($this->session->sess_destroy()){
			echo 1;
		}
		redirect( base_url().'administrator/index', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */