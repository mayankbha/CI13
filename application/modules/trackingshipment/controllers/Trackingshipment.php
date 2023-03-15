<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trackingshipment extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
		redirect(base_url(), 'refresh');
		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index($sh_id=''){
		$where								=		array('shipment_id' => $_GET['shipment_id']);
		$data['tracking_shipment'] 			= 		$this->common->getRecord('tracking_shipment', $where);   
		$data['shipment_id']				=		$_GET['shipment_id'];
		$this->layout->title('Tracking shipment | Hubway');
		$this->layout->view('trackshipment', $data);
		
	}
	
	public function changeStatus(){
		$carrier						=		$this->input->post('carrier');
		$where							=		array('shipment_id' => $this->input->post('shipment_id'));
		$data							=		array('status'=>4);
		$lastid 						= 		$this->common->updateRecord('shipments', $data, $where);
		
		$res							=		array(
														'tracking_number'=>$this->input->post('tracking'), 
														'shipment_id' => $this->input->post('shipment_id'),
														'carrier' => $this->input->post('carrier'),
														'user_id'=>$this->session->userdata("user_session")["id"]
													);
		$lastInsertid 					= 		$this->common->saveRecord('tracking_shipment', $res);
		
		if($lastid>0){
			header('Content-type: application/json');
			echo json_encode($carrier);
		}else{
			echo 0;
		}
	}
	
}

/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */