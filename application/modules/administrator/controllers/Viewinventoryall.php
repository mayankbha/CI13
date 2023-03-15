<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewinventoryall extends Admin_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('admin_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function index(){
		
		$this->layout->title('Ware House | Hubway');
		$this->layout->view('viewinventoryall');
	
	}
	
	public function viewinventoryuser(){
		$this->layout->title('Ware House | Hubway');
		$this->layout->view('viewinventoryusers');
	}
	
}	