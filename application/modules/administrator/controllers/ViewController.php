<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViewController extends Admin_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('admin_session')){
			redirect(base_url(), 'refresh');
		}
	
		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}
	
	
	public function index(){
		
		$this->layout->title('View User | Hubway');
		$this->layout->view('viewuser');
	}
	
	public function shipmentViewDetails(){
		
		$this->session->unset_userdata('shipment_session');
		$where								=		array('shipments.shipped_status'=>1);
		$shipments 							= 		$this->common->getProduct_to_shipments($where);
		
		$data['shipments']					=		$shipments;
		$wherest							=		array('shipments.shipped_status'=>0);
		$shipments 							= 		$this->common->getProduct_to_shipments($wherest);
		$data['shipping_plans']				=		$shipments;
		
		$data['search_type']				=		'All';
		$data['plan_type']					=		1;
		$data['radio_search']				=		'All';
		
		
		$this->layout->title('View Shipment | Hubway'); 
		$this->layout->view('shipmentviewdetail', $data);
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
		
	
		
		$getUserCarriers = $this->common->getRecord('shipping_user_carrier');
		
		$data['user_carriers'] = $getUserCarriers;
		
		$tracking_data = $this->common->getRecord('tracking_shipment', array('shipment_id' => $shipments_id));
		
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
	
	public function search(){
		if($_POST){ 
			if($this->input->post('daterange')=='all'){ 
				$plan_type							=		$this->input->post('plan_type');

				
				$where								=		array('shipments.shipped_status'=>1);
				

				$status								=		$this->input->post('search_type');
				$day								=		365;
				$shipments 							= 		$this->common->getdayRecord('shipments', $day, $status, $where);
				$data['daterange']					=		$this->input->post('daterange');
				$data['to']							=		'';
				$data['from']						=		'';
				$data['shipments']					=		$shipments;
				$data['search_type']				=		$status;
				$data['plan_type']					=		$plan_type;
				$data['radio_search']				=		'All';
				
				$day								=		365;
				$where								=		array('shipments.shipped_status '=>0);
				$shipping_plans 					= 		$this->common->getdayRecord('shipments', $day, 'All', $where);
				$data['shipping_plans']				=		$shipping_plans;
				
				$this->layout->title('View Shipment | Hubway');
				$this->layout->view('shipmentviewdetail', $data);

			} else if($this->input->post('daterange')!='all'  &&  $this->input->post('from')==''  &&  $this->input->post('to')==''){
				$plan_type							=		$this->input->post('plan_type');
				
				
				$where								=		array('shipments.shipped_status'=>1);
				
				
				
				$status								=		$this->input->post('search_type');
				$day								=		$this->input->post('daterange');
				$shipments 							= 		$this->common->getdayRecord('shipments', $day, $status, $where);
				$data['daterange']					=		$this->input->post('daterange');
				$data['to']							=		'';
				$data['from']						=		'';
				$data['shipments']					=		$shipments;
				$data['search_type']				=		$status;
				$data['plan_type']					=		$plan_type;
				$data['radio_search']				=		'All';
				
				$day								=		365;
				$where								=		array('shipments.shipped_status '=>0);
				$shipping_plans 					= 		$this->common->getdayRecord('shipments', $day, 'All', $where);
				$data['shipping_plans']				=		$shipping_plans;
				$this->layout->title('View Shipment | Hubway');
				$this->layout->view('shipmentviewdetail', $data);

			}else if($this->input->post('from')!=''       &&    $this->input->post('to')!=''){
				$plan_type							=		$this->input->post('plan_type');
				
				
				$where								=		array('shipments.shipped_status'=>1);
				
				$from								=		$this->input->post('from');
				$to									=		$this->input->post('to');
				$status								=		$this->input->post('search_type');
				

				$shipments 							= 		$this->common->getdate_rangeRecord('shipments', $to, $from, $status, $where);
				$data['daterange']					=		$this->input->post('daterange');
				$data['to']							=		$this->input->post('to');
				$data['from']						=		$this->input->post('from');
				$data['shipments']					=		$shipments;
				$data['search_type']				=		$status;
				$data['plan_type']					=		$plan_type;
				$data['radio_search']				=		'All';
				
				$where								=		array('shipments.shipped_status '=>0);
				$day								=		365;
				$shipping_plans 							= 		$this->common->getdayRecord('shipments', $day, 'All', $where);
				$data['shipping_plans']				=		$shipping_plans;

				$this->layout->title('View Shipment | Hubway');
				$this->layout->view('shipmentviewdetail', $data);

			}else{ 
				$where								=		array('shipments.shipped_status'=>1);
				$shipments 							= 		$this->common->getProduct_to_shipments($where);
				$data['shipments']					=		$shipments;
				$wherest							=		array('shipments.shipped_status '=>0);
				$shipments 							= 		$this->common->getProduct_to_shipments($wherest);
				$data['shipping_plans']				=		$shipments;
				
				$data['search_type']				=		'All';
				$data['plan_type']					=		1;
				$data['radio_search']				=		'All';
				
				$this->layout->title('View Shipment | Hubway');
				$this->layout->view('shipmentviewdetail', $data);
			}
		}else{
			$where								=		array('shipments.shipped_status'=>1);
			$shipments 							= 		$this->common->getProduct_to_shipments($where);
			
			$data['shipments']					=		$shipments;
			$wherest							=		array('shipments.shipped_status'=>0);
			$shipments 							= 		$this->common->getProduct_to_shipments($wherest);
			$data['shipping_plans']				=		$shipments;
			
			$data['search_type']				=		'All';
			$data['plan_type']					=		1;
			$data['radio_search']				=		'All';
			
			$this->layout->title('View Shipment | Hubway');
			$this->layout->view('shipmentviewdetail', $data);
		}
	}
	
	
	public function search_in_plan_type(){ 
			
		
			if($_POST){ 
				if($this->input->post('radio_search')=='All' && $this->input->post('plan_type')==0){  
					$plan_type							=		$this->input->post('plan_type');
					$status								=		$this->input->post('radio_search');
					$where								=		array('shipments.shipped_status'=>1);
					$shipments 							= 		$this->common->getProduct_to_shipments($where);
				
					$data['shipments']					=		$shipments;
					$wherest							=		array('shipments.shipped_status'=>0);
					$shipments 							= 		$this->common->getProduct_to_shipments($wherest);
					$data['shipping_plans']				=		$shipments;
				
					$data['search_type']				=		'All';
					$data['plan_type']					=		$plan_type;
					$data['radio_search']				=		$status;
				
					$this->layout->title('View Shipment | Hubway');
					$this->layout->view('shipmentviewdetail', $data);

				}else{ 
					$plan_type							=		$this->input->post('plan_type');
					$where								=		array('shipments.shipped_status'=>0);

					$status								=		$this->input->post('radio_search');
					$day								=		365;
					$shipping_plans 					= 		$this->common->getdayRecord('shipmentbs', $day, $status, $where);
					$data['shipping_plans']				=		$shipping_plans;
					
					$where								=		array('shipments.shipped_status '=>1);
					$shipments 							= 		$this->common->getProduct_to_shipments($where);
					$data['shipments']					=		$shipments;
					$data['search_type']				=		'All';
					$data['radio_search']				=		$status;
					
					$data['plan_type']					=		$plan_type;
					$this->layout->title('View Shipment | Hubway');
					$this->layout->view('shipmentviewdetail', $data);
				}
		}else{
			$where								=		array('shipments.shipped_status'=>1);
			$shipments 							= 		$this->common->getProduct_to_shipments($where);
			
			$data['shipments']					=		$shipments;
			$wherest							=		array('shipments.shipped_status'=>0);
			$shipments 							= 		$this->common->getProduct_to_shipments($wherest);
			$data['shipping_plans']				=		$shipments;
			
			$data['search_type']				=		'All';
			$data['plan_type']					=		1;
			$data['radio_search']				=		'All';
			
			$this->layout->title('View Shipment | Hubway');
			$this->layout->view('shipmentviewdetail', $data);
		}
	}
	
	
}	