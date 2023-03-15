<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {	public $data = '';
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */

		$this->load->library('paypal');
		if(!$this->session->userdata('admin_session'))
			redirect(base_url(), 'refresh');
	}

	public function index() {
		
		$this->layout->title('Admin Dashboard | Hubway');
		$this->layout->view('dashboard', $this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */