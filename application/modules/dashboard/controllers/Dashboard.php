<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {	public $data = '';
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */

		$this->load->library('paypal');
	}

	public function index() {		
		
		$warehouseModuleStatus = $this->common->getRecordCount('warehouse', array('user_id' => $this->session->userdata('user_session')['id']));
		
		if($warehouseModuleStatus > 0)			
			$this->data['warehouseModuleStatus'] = 1;		
		
		$paypalmoduleStatus = $this->common->getRecordCount('paypal', array('user_id' => $this->session->userdata('user_session')['id']));		
		
		if($paypalmoduleStatus == 0)			
			$alipaymoduleStatus = $this->common->getRecordCount('alipay', array('user_id' => $this->session->userdata('user_session')['id']));		
		
		if($paypalmoduleStatus > 0 || $alipaymoduleStatus > 0)			
			$this->data['paypalModuleStatus'] = 1;		
		
		$shipstationmoduleStatus = $this->common->getRecordCount('shipstation', array('user_id' => $this->session->userdata('user_session')['id']));		
		
		if($shipstationmoduleStatus > 0)			
			$this->data['shipstationModuleStatus'] = 1;
		
		
		$amazonconfig = $this->common->getRecordCount('config', array('user_id' => $this->session->userdata('user_session')['id']));
		if($amazonconfig > 0)			
			$this->data['amazonconfig'] = 1;
		
		$amazonconfigadvet = $this->common->getRecordCount('config_advertisement');				
		if($amazonconfigadvet > 0)			
			$this->data['amazonconfigadvet'] = 1;
		
		
		$this->layout->title('Dashboard | Hubway');
		$this->layout->view('dashboard', $this->data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */