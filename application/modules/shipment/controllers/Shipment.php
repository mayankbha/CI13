<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Shipment extends MY_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function viewShipment($shipments_id=''){
		if($shipments_id==''){
			$shipments_id				=		$_GET['shipment_id'];
		}
		
		$where							=		array('shipment_id'=>$shipments_id);
		$shipments 						= 		$this->common->getSingleRecord('shipments', $where);
		$products						=		$this->common->getRecord('product_to_shipments',$where);
		
		
		$whereaddress					=		array('address_id'=>$shipments->address_id);
		$address						=		$this->common->getSingleRecord('addresses',$whereaddress);
		
		$user_id = $this->session->userdata['user_session']['id'];
		
		$getUserCarriers = $this->common->getRecord('shipping_user_carrier', array('user_id' => $user_id));
		
		$data['user_carriers'] = $getUserCarriers;
		
		$tracking_data = $this->common->getRecord('tracking_shipment', array('shipment_id' => $shipments_id, 'user_id' => $user_id));
		
		if(count($tracking_data) > 0)
			$data['total_record_count'] = count($tracking_data);
		else
			$data['total_record_count'] = 1;
		
		$data['tracking_data'] = $tracking_data;
		
		$data['address']				=		$address;
		$data['products']				=		$products;
		$data['shipments']				=		$shipments;
		
		$this->layout->title('shipmentView | Hubway');
		$this->layout->view('shipmentView', $data);
	}
	
	public function addOtherCarrier() {
		$carrier = $this->input->post('field_val');

		$user_id = $this->session->userdata['user_session']['id'];

		$getExistsCarriers = $this->common->getRecord('shipping_user_carrier', array('user_id' => $user_id, 'carrier_name' => $carrier));

		if(empty($getExistsCarriers)) {
			$saveRecord = $this->common->saveRecord('shipping_user_carrier', array('user_id' => $user_id, 'carrier_name' => $carrier));

			$getUserCarriers = $this->common->getRecord('shipping_user_carrier', array('user_id' => $user_id));

			$options = '';

			foreach($getUserCarriers as $getUserCarrier) {
				if($getUserCarrier->carrier_name)
					$selected = 'selected';
				else
					$selected = '';

				$options .= '<option value="'.$getUserCarrier->carrier_name.'" selected="'.$selected.'">'.$getUserCarrier->carrier_name.'</option>';
			}

			echo $options;
		} else {
			
			echo 1;
		}
	}
	
	public function addTracking() {
		$shipment_id = $this->input->post('shipment_id');

		$tracking_number = $this->input->post('tracking_number');
		$carrier = $this->input->post('carrier');
		$departure_date = date('Y-m-d', strtotime($this->input->post('departure_date')));
		$arrival_date = date('Y-m-d', strtotime($this->input->post('arrival_date')));

		$user_id = $this->session->userdata['user_session']['id'];

		$data = array(
					'tracking_number' => $tracking_number,
					'user_id' => $user_id,
					'shipment_id' => $shipment_id,
					'carrier' => $carrier,
					'departure_date' => $departure_date,
					'arrival_date' => $arrival_date
				);

		$saveRecord = $this->common->saveRecord('tracking_shipment', $data);

		$data['tracking_data'] = $this->common->getRecord('tracking_shipment', array('shipment_id' => $shipment_id, 'user_id' => $user_id));

		$getUserCarriers = $this->common->getRecord('shipping_user_carrier', array('user_id' => $user_id));
		
		$data['user_carriers'] = $getUserCarriers;

		echo $this->load->view('add_other_carrier', $data, true);
	}
}	