<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddressController extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}
	
	public function index(){

		$array = array(
			'user_id'=>$this->session->userdata("user_session")["id"]
		);
		$addAddressDetails = $this->common->getRecordOrder('addresses',$array);

		$saveaddressDetails_id 				= 		$this->common->getRecord('user');
		$data['saveaddressDetails_id']		=		$saveaddressDetails_id[0]->address_id;
		$data['addAddressDetails'] = $addAddressDetails;
		//print_r($this->data['addAddressDetails']);die;
		$this->layout->title('Shipping Address From | Hubway');
		$this->layout->view('pickupAddress',$data);
	}
	
	public function saveAddress(){ 

		if(!empty($this->input->post('name') && $this->input->post('addressline1') && $this->input->post('addressline2') && $this->input->post('country') && $this->input->post('city') && $this->input->post('state') && $this->input->post('zipcode') && $this->input->post('contactoffice') && $this->input->post('contactmobile'))){
			//echo 0;
			
			// table name
			$table_name = 'addresses';
			
			// user has submitted anything yet!	
			$data = array(
				'user_id'=>$this->session->userdata("user_session")["id"],
				'name'=>$this->input->post('name'),
				'addressline1'=>$this->input->post('addressline1'),
				'addressline2'=>$this->input->post('addressline2'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
				'contactoffice'=>$this->input->post('contactoffice'),
				'contactmobile'=>$this->input->post('contactmobile')
			);

			$lastInsertid = $this->common->saveRecord($table_name, $data);
			if($lastInsertid>0){
				$where						=		array('address_id' =>$lastInsertid);
				$addressData 				= 		$this->common->getSingleRecord('addresses', $where);
				//header('Content-type: application/json');
				//echo json_encode($addressData);
			}
			/*$response = array(
				'address_id'=>$lastInsertid
			);
			$addAddressDetails = $this->common->getRecord('addinformation',$response);*/
			echo 1;
			
		} else {
			
			echo 0;
		}
	}
	
	public function editAddress($address_id){
		
		
		if($this->input->post('address_id')){
			$array = array(
				'address_id'=>$_POST['address_id']
			);
			$addressData = $this->common->getSingleRecord('addresses',$array);
			$data['address']				=		$addressData;
			$whereid3						=		array('id'=>$addressData->country);
			$allcountry 					= 		$this->common->getRecord('countries');
			$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
			$data['country']				=		$country;
			$data['allcountry']				=		$allcountry;
			$whereid						=		array('id'=>$addressData->state);
			$state 							= 		$this->common->getSingleRecord('states', $whereid);
			$data['state']					=		$state;
									
			$whereid1						=		array('id'=>$addressData->city);
			$city 							=		$this->common->getSingleRecord('cities', $whereid1);
			$data['city']					=		$city;
			
			
			$this->load->view('ajax/edit_address_shipment',$data);
	
			
		}else{
			
			$where							=		array('address_id' =>$address_id);
			$addressData					=	 	$this->common->getSingleRecord('addresses', $where);
			$data['address']				=		$addressData;
			$whereid3						=		array('id'=>$addressData->country);
			$allcountry 					= 		$this->common->getRecord('countries');
			$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
			$data['country']				=		$country;
			$data['allcountry']				=		$allcountry;
			$whereid						=		array('id'=>$addressData->state);
			$state 							= 		$this->common->getSingleRecord('states', $whereid);
			$data['state']					=		$state;
									
			$whereid1						=		array('id'=>$addressData->city);
			$city 							=		$this->common->getSingleRecord('cities', $whereid1);
			$data['city']					=		$city;
			
			
			$this->load->view('ajax/edit_address',$data);
		}
	}
	
	public function saveEditInformation(){ 
		
		if(!empty($this->input->post('name') && $this->input->post('addressline1') && $this->input->post('addressline2') && $this->input->post('country') && $this->input->post('state') && $this->input->post('city') && $this->input->post('zipcode') && $this->input->post('contactoffice') && $this->input->post('contactmobile'))){
			
			// table name
			$table_name = 'addresses';
			
			// user has submitted anything yet!	
			$data = array(
				'name'=>$this->input->post('name'),
				'addressline1'=>$this->input->post('addressline1'),
				'addressline2'=>$this->input->post('addressline2'),
				'country' =>$this->input->post('country'),
				'state' =>$this->input->post('state'),
				'city'=>$this->input->post('city'),
				'zipcode'=>$this->input->post('zipcode'),
				'contactoffice'=>$this->input->post('contactoffice'),
				'contactmobile'=>$this->input->post('contactmobile')
			);
			
			$updateID = array(
				'address_id'=>$this->input->post('address_id')
			);

			$lastInsertid = $this->common->updateRecord($table_name, $data, $updateID);
			if($lastInsertid>0){
				$data						=		array('address_id' =>$this->input->post('address_id'));
				$addressData 				= 		$this->common->getSingleRecord('addresses', $data);
				header('Content-type: application/json');
				echo json_encode($addressData);
			}
		} else {
			echo 0;
		}
	}
	public function deleteAddress(){
		
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$value = $this->input->post('value');

		$response = $this->common->deleteRecord($table, $column, $value);

		echo $response;
	}
	
	public function saveaddressDetails(){
		if($this->input->post('id')){
			$data			=	array('address_id' =>$this->input->post('id'));
			$where			=	array('id' => $this->session->userdata("user_session")["id"]);
			$lastInsertid 	= 	$this->common->updateRecord('user', $data, $where);
			if($lastInsertid>0){
				$addressData 					= 		$this->common->getSingleRecord('addresses', $data);

				$whereid3						=		array('id'=>$addressData->country);
				$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
									
				$whereid						=		array('id'=>$addressData->state);
				$state 							= 		$this->common->getSingleRecord('states', $whereid);
									
				$whereid1						=		array('id'=>$addressData->city);
				$city 							=		$this->common->getSingleRecord('cities', $whereid1);
				
				if(isset($country) &&  ($state)	&&  ($city)){
					$addressData					=	array(
																'address_id'=>$addressData->address_id,
																'user_id'=>$addressData->user_id,
																'name'=>$addressData->name,
																'addressline1'=>$addressData->addressline1,
																'addressline2'=>$addressData->addressline2,
																'country'=>$country->name,
																'city'=>$city->name,
																'zipcode'=>$addressData->zipcode,
																'contactoffice'=>$addressData->contactoffice,
																'contactmobile'=>$addressData->contactmobile,
																'state'=>$state->name
														);		
				}
				
				if($this->session->userdata("shipment_session")){
					$shipments_id	=		$this->session->userdata("shipment_session")["shipments_id"];
					$shdata			=		array('address_id' =>$this->input->post('id'));
					$shwhere		=		array('shipment_id' => $shipments_id);
					$lastInsertid 	= 		$this->common->updateRecord('shipments', $shdata, $shwhere);
				}
				if($this->session->userdata("order_session")){
					$order_id	=		$this->session->userdata("order_session")["order_id"];
					$shdata			=		array('ship_to_address_id' =>$this->input->post('id'));
					$shwhere		=		array('order_id' => $order_id);
					$lastInsertid 	= 		$this->common->updateRecord('orders', $shdata, $shwhere);
				}
				header('Content-type: application/json');
				echo json_encode($addressData);
			}else{
				echo 0;
			}
		}else {
			echo 0;
		}
	}
	public function getAddresses(){
		$array = array(
			'user_id'=>$this->session->userdata("user_session")["id"]
		);
		$addAddressDetails 					= 		$this->common->getRecordOrder('addresses',$array);
		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
		$where								=		array('address_id'=>$saveaddressDetails_id->address_id);
		
		$data['addAddressDetails']				= 		$addAddressDetails;
		$data['saveaddressDetails_id']			=		$saveaddressDetails_id->address_id;
		
		$this->load->view('ajax/get_addresses',$data);
	}
	
	
	public function getUserAddress_order(){
		$array = array(
			'user_id'=>$this->session->userdata("user_session")["id"]
		);
		$addAddressDetails 					= 		$this->common->getRecordOrder('addresses',$array);
		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
		$where								=		array('address_id'=>$saveaddressDetails_id->address_id);
		
		$data['addAddressDetails']				= 		$addAddressDetails;
		$data['saveaddressDetails_id']			=		$saveaddressDetails_id->address_id;
		
		$this->load->view('ajax/get_addresses_order',$data);
	}
}	