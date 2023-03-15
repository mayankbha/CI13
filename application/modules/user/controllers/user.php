<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Login_Controller {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	// Loading page and login
	public function index() {
		$this->layout->title('Login | Hubway');

		$this->layout->view('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */