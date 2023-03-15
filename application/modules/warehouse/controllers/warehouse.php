<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Warehouse extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect(base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index() {
		if($this->input->post()) {
			if($this->input->post('status'))
				$this->common->saveRecord('warehouse', array('user_id' => $this->session->userdata('user_session')['id'], 'status' => $this->input->post('status')));
			else
				$this->common->deleteRecord('warehouse', 'user_id', $this->session->userdata('user_session')['id']);
		}

		$warehouseCount = $this->common->getRecordCount('warehouse', array('user_id' => $this->session->userdata('user_session')['id']));

		if($warehouseCount > 0)
			$this->data['warehouseInfo'] = $this->common->getSingleRecord('warehouse', array('user_id' => $this->session->userdata('user_session')['id']));

		$this->layout->title('WareHouse | Hubway');

		$this->layout->view('warehouse', $this->data);
	}
	
}

/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */