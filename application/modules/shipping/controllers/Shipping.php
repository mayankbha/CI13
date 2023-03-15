<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
		redirect(base_url(), 'refresh');
		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index(){ 
	
		$array = array(
			'user_id'=>$this->session->userdata("user_session")["id"]
		);
		$inventoryDetails 					= 		$this->common->getRecord('inventory_data');
		$wheredraft							=		array('draft'=>1);
		$existing_shipping_plan 			= 		$this->common->getRecord('shipments', $wheredraft);

		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
	

		$data['saveaddressDetails_id']			=		$saveaddressDetails_id->address_id;
		$data['existing_shipping_plan']			=		$existing_shipping_plan;
		$data['inventoryData']					=		$inventoryDetails;

		$where								=		array('address_id'=>$saveaddressDetails_id->address_id);
		$saveaddressDetails					=		$this->common->getRecord('addresses',$where);
		if(!empty($saveaddressDetails)){  
			$data['saveaddressDetails']			=		$saveaddressDetails;
		}else{
			$data['saveaddressDetails']			=		'';
		}
		
		$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		if($shipments_id){
			$whereshipment					=		array('shipment_id'=>$shipments_id);
			$shipment_data 					= 		$this->common->getSingleRecord('shipments', $whereshipment);
			$data['shipments']				=		$shipment_data;		
		}
		
		$addAddressDetails = $this->common->getRecordOrder('addresses',$array);
		$country 				= 		$this->common->getRecord('countries');
		
		$data['allcountry']  = $country;
	

		$data['addAddressDetails'] = $addAddressDetails;
		$this->session->unset_userdata('order_session');
		$this->layout->title('Shipping | Hubway');
		$this->layout->view('shipping', $data);
	
	}

	public function selectState(){
		$data = array(
			'country_id'=>$_POST['country_id']
		); 
		$state 					= 		$this->common->getRecord('states',$data);
		
		
		if($state > 0){
			foreach($state as $row){
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
				
			}
		}else{
			echo '<option value="">State not available</option>';
		}
		
	}

	public function selectCity(){
		$data = array(
			'state_id'=>$_POST['state_id']
		); 
		$city 					= 		$this->common->getRecord('cities',$data);
		
		
		if($city > 0){
			foreach($city as $row){
				echo '<option value="'.$row->id.'">'.$row->name.'</option>';
				
			}
		}else{
			echo '<option value="">City not available</option>';
		}
		
	}

	public function work_on_shipment(){
		$this->layout->title('Work On Shipment | Hubway');
		$this->layout->view('process_shipment', $this->data);
	}

	public function view_shipment(){ 
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
		$this->layout->view('viewShipment', $data);
	}

	public function inventoryView(){
		$inventoryData 					= 		$this->common->getRecord('inventory_data');
		$data['products']				=		$inventoryData;
		$this->layout->title('View Inventory | Hubway');
		$this->layout->view('inventoryView', $data);
	}

	public function createShiping(){

		if($this->input->post('createShiping')){ 
			$this->session->unset_userdata('shipment_session');
		$date 	= 		date('Y-m-d H:i:s');
		$data	=		array(
							'shipment_name'=>$this->input->post('shipment_name'), 
							'booking_number'=>'',
							'return_shipment'=>$this->input->post('return_shipment'),
							'user_id'=>$this->session->userdata("user_session")["id"] ,
							'created'=>$date, 'address_id'=>$this->input->post('address_id'), 
							'shipping_plan_type'=>$this->input->post('shipping_plan_type'), 
							'draft'=>1, 
							'status'=>2, 
							'step'=>1
						);

			$lastInsertid 					= 		$this->common->saveRecord('shipments', $data);
			if($lastInsertid>0){
				$shipment_session 		= 		array(
														'shipments_id' => 	$lastInsertid,
														'shipment_name' => $this->input->post('shipment_name'),
														'logged_in' => TRUE
													);
				$this->session->set_userdata('shipment_session', $shipment_session);

				$where_sh					=		array('shipment_id'=>$lastInsertid);
				$datas						=		array('shipping_id'=>'HUB-SH-100100'.$lastInsertid);
				$update 					= 		$this->common->updateRecord('shipments', $datas, $where_sh);
				$shipment_data 				= 		$this->common->getSingleRecord('shipments', $where_sh);
				header('Content-type: application/json');
				echo json_encode($shipment_data);
			}
		}else if($this->input->post('updatexistingShipping')){ 

			$data							=		array(
														'address_id'=> $this->input->post('address_id'), 
														'shipping_plan_type'=>$this->input->post('shipping_plan_type')
													);
			$where							=		array('shipment_id'=>$this->input->post('shipment_id'));
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				$success					=		array('success'=>'updated');
				header('Content-type: application/json');
				echo json_encode($success);
			}
		}
	}

//Get current shipment
	public function getShipment(){
		$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		if($shipments_id){
			$whereshipment					=		array('shipment_id'=>$shipments_id);
			$shipment_data 					= 		$this->common->getSingleRecord('shipments', $whereshipment);
			header('Content-type: application/json');
			echo json_encode($shipment_data);
		}else{
			$error							=		array('error'=>'shipment not found');
			header('Content-type: application/json');
			echo json_encode($shipment_data);
		}
	}
	
	
	
	public function getShipmentProduct(){
		$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		$where							=		array('shipment_id'=>$shipments_id);
		$products 						= 		$this->common->getRecord('product_to_shipments',$where);
		header('Content-type: application/json');
		echo json_encode($products);
	}
	
	
	
	
	public function checkShipmentName(){
		if($this->input->post('checkShipmentName')){
			$where							=		array('shipment_name'=>$this->input->post('shipment_name'));
			$existing_shipping_plan 		= 		$this->common->getRecordCount('shipments', $where);
			
			
			if($this->session->userdata("shipment_session")){
				$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
				$data							=		array('shipment_name'=>$this->input->post('shipment_name'));
				$where							=		array('shipment_id'=>$shipments_id);
				$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);
			}
			
			if($existing_shipping_plan>0){
				$array						=		array('shipment_name'=>$this->input->post('shipment_name'),'check'=>1);
				header('Content-type: application/json');
				echo json_encode($array);
			}else{
				$error				=		array('success'=>'updated');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}
	}

	public function checkshippingAddresses(){
		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
		$where								=		array('address_id'=>$saveaddressDetails_id->address_id);
		$saveaddressDetails					=		$this->common->getRecord('addresses',$where);
		if(!empty($saveaddressDetails)){  
			$array							=		array('shipment_name'=>$this->input->post('shipment_name'),'check'=>1);
			header('Content-type: application/json');
			echo json_encode($array);
		}else{
			$error				=		array('error'=>'0');
			header('Content-type: application/json');
			echo json_encode($error);
		}
		
	}
	
	public function checkshipmentCost($id=""){
		if($id==''){
			$where									=		array('shipment_id'=>$this->session->userdata("shipment_session")["shipments_id"],'cost'=>0,'cost'=>NULL);
				$costCount 							= 		$this->common->getRecordCount('product_to_shipments',$where);
				if($costCount>0){  
					$array							=		array('cost'=>$costCount);
					header('Content-type: application/json');
					echo json_encode($array);
				}else{
					$error				=		array('cost'=>'0');
					header('Content-type: application/json');
					echo json_encode($error);
				}
		}else{
			$where								=		array('inventory_id'=>$id);
			$costCount 							= 		$this->common->getSingleRecord('inventory_data',$where);
			if(!empty($costCount)){
				header('Content-type: application/json');
				echo json_encode($costCount->cost);
			}
		}
		
		
	}
	
	
	public function saveShiping(){
		if($this->input->post('saveShiping')){
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$data							=		array(
														'draft'=> 0, 
														'step'=>5, 
														'status'=>2,
														'booking_created'=>'BOKHUBY-'.date("Y-m-d h-i-sa"),
														'booking_number'=>'hub-'.substr( md5(rand()), 0, 9)
													);
			$where							=		array('shipment_id'=>$shipments_id);
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				$this->session->unset_userdata('shipment_session');
				$success					=		array('success'=>'unset_userdat shipment_session');
				header('Content-type: application/json');
				echo json_encode($success);
			}else{
				$error						=		array('success'=>'error in unset_userdat shipment_session');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}
		if($this->input->post('saveShiping5step')){
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$data							=		array(
														'draft'=> 0, 
														'step'=>5, 
														'status'=>2,
													);
			$where							=		array('shipment_id'=>$shipments_id);
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				$this->session->unset_userdata('shipment_session');
				$success					=		array('success'=>'unset_userdat shipment_session');
				header('Content-type: application/json');
				echo json_encode($success);
			}else{
				$error						=		array('success'=>'error in unset_userdat shipment_session');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}
		if($this->input->post('saveShiping_workonShiping')){
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$data							=		array(
														'draft'=> 0, 
														'step'=>6, 
														'status'=>2,
														'booking_created'=>'BOKHUBY-'.date("Y-m-d h-i-sa"),
														'booking_number'=>'hub-'.substr( md5(rand()), 0, 9)
													);
			$where							=		array('shipment_id'=>$shipments_id);
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				header('Content-type: application/json');
				echo json_encode($data);
			}else{
				$error					=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}
	}

	function updatexistingShipping(){
		if($this->input->post('updatexistingShipping')){
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$data							=		array(
														'address_id'=> $this->input->post('address_id'), 
														'shipping_plan_type'=>$this->input->post('shipping_plan_type')
													);
			$where							=		array('shipment_id'=>$shipments_id);

			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				$whereshipment				=		array('shipment_id'=>$shipments_id);
				$shipment_data 				= 		$this->common->getSingleRecord('shipments', $whereshipment);

				header('Content-type: application/json');
				echo json_encode($shipment_data);
			}else{
				$error						=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}else{
			$error							=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	public function updateShiping(){ 
		$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		if($this->input->post('updateShiping')){
			$shipment_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			if(!empty($_POST['ids'])){
				$response = $this->common->deleteRecord('product_to_shipments', 'shipment_id', $shipment_id);
				foreach ($_POST['ids'] as $value) {					
					$whereproduct			=		array('inventory_id'=>$value);

					$inventoryData			=		$this->common->getSingleRecord('inventory_data',$whereproduct);		

					$product_to_shipment	=		array(
														'shipment_id'=>$shipment_id, 
														'product_id'=>$value, 
														'user_id'=>$this->session->userdata("user_session")["id"], 
														'merchant_SKU'=>$inventoryData->merchant_SKU ,
														'title'=>$inventoryData->title , 
														'condition'=>$inventoryData->condition ,
														'price'=>$inventoryData->price,
														'cost'=>$inventoryData->cost,
														'inbound'=>$inventoryData->inbound,
														'fulfillable'=>$inventoryData->fulfillable,
														'reserved'=>$inventoryData->reserved, 
														'fee_preview'=>$inventoryData->fee_preview, 
														'unit_volume'=>$inventoryData->unit_volume
													);
 
					$lastInsid 				= 		$this->common->saveRecord('product_to_shipments', $product_to_shipment);
				}
			}
		}

		if($this->input->post('updateLabel')){	
			$data							=		array('label_to_print' =>$this->input->post('label_to_print'),'label_cost' =>$this->input->post('label_cost'));
			$where							=		array('product_id' => $this->input->post('product_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_shipments', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Shipment' =>'updated');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}
		
		if($this->input->post('markusShipment')){	
			$data							=		array('shipped_status' =>1, 'status'=>4);
			$where							=		array('shipment_id' => $this->input->post('shipment_id'));
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Shipment' =>'markusShipped');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('deleteShipment')){
			$shipments_id					=		$this->input->post('shipment_id');
			$where 							= 		array('shipment_id'=>$shipments_id);
			$data							=		array('status'=>0);
			$lastid 						= 		$this->common->updateRecord('shipments', $data, $where);	
			if($lastid){
				$message					=		array('Shipment' =>'Deleted');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('updateShipingState')){	
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$data							=		array('step' =>$this->input->post('step'));
			$where							=		array('shipment_id' => $shipments_id);

			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);
			if($lastInsertid>0){
				if($this->input->post('step')==4){
					$where						=		array('shipment_id'=>$shipments_id);
					$shipmentsData 				= 		$this->common->getSingleRecord('shipments', $where);
					if($shipmentsData->shipping_plan_type=='Casepacked Products'){
						$units							=		$this->common->countProductUnitcases('product_to_shipments', $where);
						$data							=		array('unit' =>$units->total);
						$this->common->updateRecord('shipments', $data, $where);
					}else{
						$units							=		$this->common->countProductUnit('product_to_shipments', $where);
						$data							=		array('unit' =>$units->total);
						$this->common->updateRecord('shipments', $data, $where);
					}
				}
				$message					=		array('Shipment' =>'updated state');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('updateQuantity') && $this->input->post('quantity')!=0){	 
			$data							=		array('shipment_quantity' =>$this->input->post('quantity'));
			$where							=		array('product_id' => $this->input->post('product_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_shipments', $data, $where);

			if($lastInsertid>0){
				$where							=		array('shipment_id' => $shipments_id);
				$units							=		$this->common->countProductUnit('product_to_shipments', $where);
				$data							=		array('unit' =>$units->total);
				$this->common->updateRecord('shipments', $data, $where);
				$message					=		array('Shipment' =>'Updated Quantity');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('updateCases') && $this->input->post('quantity')!=0){	
			$data							=		array(
															'shipment_quantity' =>$this->input->post('quantity'), 
															'number_of_cases'=>$this->input->post('number_of_cases'), 
															'unit_per_case'=>$this->input->post('unit_per_case')
														);
			$where							=		array('product_id' => $this->input->post('product_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_shipments', $data, $where);

			if($lastInsertid>0){
				$where							=		array('shipment_id' => $shipments_id);
				$units							=		$this->common->countProductUnitcases('product_to_shipments', $where);
				$data							=		array('unit' =>$units->total);
				$this->common->updateRecord('shipments', $data, $where);
				header('Content-type: application/json');
				echo json_encode($lastInsertid);
			}
		}

		if($this->input->post('Shippedstatus')){	
			$data							=		array(
															'shipped'=>$this->input->post('shipped')
															);
			$where							=		array('shipment_id' => $this->input->post('shipment_id'));
			$lastInsertid 					= 		$this->common->updateRecord('shipments', $data, $where);

			if($lastInsertid>0){
				header('Content-type: application/json');
				echo json_encode($lastInsertid);
			}
		}

		if($this->input->post('changePackingtypes')){	
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments', $where);

			if($shipments->shipping_plan_type == 'Individual Products'){
				$plan						=		'Casepacked Products';
			}else{
				$plan						=		'Individual Products';
			}

			$data							=		array('shipping_plan_type'=>$plan);
			$lastid 						= 		$this->common->updateRecord('shipments', $data, $where);	
			if($lastid>0){
				$where						=		array('shipment_id'=>$shipments_id);
				$shipmentsData 				= 		$this->common->getSingleRecord('shipments', $where);
				header('Content-type: application/json');
				echo json_encode($shipmentsData);
			}else{
				$error						=		array('error'=>'error in update Packingtypes');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}

		if($this->input->post('addProdcut')){	
			$shipment_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$whereproduct					=		array('inventory_id'=>$this->input->post('product_id'));

			$inventoryData					=		$this->common->getSingleRecord('inventory_data',$whereproduct);		

			$product_to_shipment			=		array(
														'shipment_id'=>$shipment_id, 
														'product_id'=>$this->input->post('product_id'), 
														'user_id'=>$this->session->userdata("user_session")["id"], 
														'merchant_SKU'=>$inventoryData->merchant_SKU ,
														'title'=>$inventoryData->title , 
														'condition'=>$inventoryData->condition ,
														'cost'=>$inventoryData->cost,
														'price'=>$inventoryData->price,
														'inbound'=>$inventoryData->inbound,
														'fulfillable'=>$inventoryData->fulfillable,
														'reserved'=>$inventoryData->reserved, 
														'fee_preview'=>$inventoryData->fee_preview, 
														'EAN'=>$inventoryData->EAN,
														'UPC'=>$inventoryData->UPC, 
														'unit_volume'=>$inventoryData->unit_volume,
														'asin1'=>$inventoryData->asin1,
														'asin2'=>$inventoryData->asin2,
														'asin3'=>$inventoryData->asin3
													);

			$lastInsid 						= 		$this->common->saveRecord('product_to_shipments', $product_to_shipment);

			if($lastInsid>0){
				$where							=		array('shipment_id'=>$shipment_id);
				$products 						= 		$this->common->getRecord('product_to_shipments',$where);
				header('Content-type: application/json');
				echo json_encode($products);
			}else{
				$error						=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}		

		if($this->input->post('deleteProduct')){	
			$shipments_id					=		$this->session->userdata("shipment_session")["shipments_id"];
			$response 						= 		$this->common->deleteRecord('product_to_shipments', 'product_id', $this->input->post('product_id'));
			if($response>0){
				$where							=		array('shipment_id'=>$shipments_id);
				$products 						= 		$this->common->getRecord('product_to_shipments',$where);
				header('Content-type: application/json');
				echo json_encode($products);
			}else{
				$error					=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}	

	}

	public function createSession(){
		if($this->input->post('createSession')){

			$where							=		array('shipment_id'=>$this->input->post('shipment_id'));
			$shipment_data 					= 		$this->common->getSingleRecord('shipments', $where);
			if(!empty($shipment_data)){
				$this->session->unset_userdata('shipment_session');
				$shipment_session 			= 		array(
														'shipments_id' => 	$this->input->post('shipment_id'),
														'logged_in' => TRUE
													);
			}

			$this->session->set_userdata('shipment_session', $shipment_session);
			header('Content-type: application/json');
			echo json_encode($shipment_data);
		}else{
			$error							=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	
	public function getShiping($step='', $shipments_id='' ){  
		$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		$user_id							=		$this->session->userdata('user_session')['id'];
		
		$saveaddressDetails_id 	= 	$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
		
		
		if($shipments_id!=null){
			$where							=		array('shipment_id'=>$shipments_id);
			$data							=		array('step'=>$step);
			$lastid 						= 		$this->common->updateRecord('shipments', $data, $where);
		}

		if($step==1){
			$where							=		array('shipment_id'=>$shipments_id);
			$products 						= 		$this->common->getRecord('product_to_shipments',$where);
			$data['products']				=		$products;
			$this->load->view('steps/shipment/step1_table', $data);
		}

		if($step==2){
			
			if($shipments_id!=''){  
				$where						=		array('shipment_id'=>$shipments_id);
				$products 					= 		$this->common->getRecord('product_to_shipments',$where);

				$inventoryDetails 			= 		$this->common->getRecord('inventory_data');

				$data['inventoryData']		=		$inventoryDetails;
				$data['existshipingProduct']=		$products;

				$this->load->view('steps/shipment/step2_table', $data);
			}else{
				$inventoryDetails 			= 		$this->common->getRecord('inventory_data');
				$data['inventoryData']		=		$inventoryDetails;
				$this->load->view('steps/shipment/step2_table', $data);
			}
		}
		if($step==3){
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments', $where);

			$where_addressid				=		array('address_id'=>$saveaddressDetails_id->address_id );
			$saveaddressDetails				=		$this->common->getSingleRecord('addresses',$where_addressid);

			$products 						= 		$this->common->getRecord('product_to_shipments',$where);

			$data['saveaddressDetails']		=		$saveaddressDetails;
			$data['shipments']				=		$shipments;
			$data['products']				=		$products;
		
			$this->load->view('steps/shipment/step3_table', $data);
		}
		if($step==4){
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments', $where);

			$where_addressid				=		array('address_id'=>$saveaddressDetails_id->address_id);
			$saveaddressDetails				=		$this->common->getSingleRecord('addresses',$where_addressid);

			$products 						= 		$this->common->getRecord('product_to_shipments',$where);

			$data['saveaddressDetails']		=		$saveaddressDetails;
			$data['shipments']				=		$shipments;

			$data['products']				=		$products;
			
			$this->load->view('steps/shipment/step4_table', $data);
		}
		if($step==5){
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments', $where);

			$where_addressid				=		array('address_id'=>$saveaddressDetails_id->address_id);
			$saveaddressDetails				=		$this->common->getSingleRecord('addresses',$where_addressid);

			$products 						= 		$this->common->getRecord('product_to_shipments',$where);
			
			$data['saveaddressDetails']		=		$saveaddressDetails;
			$data['shipments']				=		$shipments;
			$data['products']				=		$products;
			
			$this->load->view('steps/shipment/step5_table', $data);
		}
		if($step==6){
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments',$where);
			
			$whereaddress					=		array('address_id'=>$shipments->address_id);
			$addressDetails					= 		$this->common->getSingleRecord('addresses',$whereaddress);
			
			$data['configData']				= 		$this->config->item('work_on_shipment');
			$user_info 						= 		$this->common->getSingleRecord('user',array('id'=>$user_id));
			$data['user_info']				=		$user_info;
			$data['shipments']				=		$shipments;
			$data['addressDetails']			=		$addressDetails;
			$this->load->view('steps/shipment/step6_table', $data);
		}
		if($step==7){
			$where							=		array('shipment_id'=>$shipments_id);
			
			$shipments 						= 		$this->common->getSingleRecord('shipments',$where);
			$product_to_shipments 			= 		$this->common->getRecord('product_to_shipments',$where);
			$whereuser_id					=		array('user_id'=>$user_id);
			$business_information 			= 		$this->common->getSingleRecord('business_information',$whereuser_id);
			
			$data['business_information']				=		$business_information;
			$data['shipments']							=		$shipments;
			
			$data['product_to_shipments']				=		$product_to_shipments;
			//$where							=		array('shipments.shipment_id'=>$shipments_id);
			//$shipments 						= 		$this->common->getRecordWithJoin();
			$this->load->view('steps/shipment/step7_table', $data);
		}
	}

	public function add_to_an_existing_shipping_plan(){
		if($this->input->post('add_exist_shipment')){
			$this->session->unset_userdata('shipment_session');
			$shipment_session = array(
				'shipments_id' => 	$this->input->post('exist_shipment_plan'),
				'logged_in' => TRUE
			);
			$this->session->set_userdata('shipment_session', $shipment_session);

			$exist_shipment_id		=		$this->input->post('exist_shipment_plan');
			$where					=		array('shipment_id'=>$exist_shipment_id);
			$existproduct			=		$this->common->getRecord('product_to_shipments',$where);
			$data['products']		=		$existproduct;
			$this->load->view('steps/shipment/step1_table', $data);
		}else{
			$error					=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	public function deleteRecord() { 
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$value = $this->input->post('value');
		$response = $this->common->deleteRecord($table, $column, $value);
		echo $response;
	}

	public function getAddress(){
		if($this->input->post('getAddress')){
			$shipment_id			=		$this->input->post('shipment_id');
			$where					=		array('shipment_id'=>$shipment_id);
			$shipments				=		$this->common->getRecord('shipments',$where);

			if(!empty($shipments)){
				$shipment_id		=		$this->input->post('shipment_id');
				$where_addressid	=		array('address_id'=>$shipments[0]->address_id);
				$addresses			=		$this->common->getSingleRecord('addresses',$where_addressid);
				header('Content-type: application/json');
				echo json_encode($addresses);
			}else{
				$error					=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}
	}

	public function sessionDestroy(){
		$this->session->unset_userdata('shipment_session');
	}

	public function save_workonShipment(){

		$shipment_id			=		$this->session->userdata("shipment_session")["shipments_id"];

		if(!empty($_POST)){
			$data				=		array(
											'draft'=> 0, 
											'step'=>7,
											'status'=>6,
											'shipment_id'=>$shipment_id, 
											'booking_number'=>$this->input->post('booking_number'), 
											'century_code'=>$this->input->post('century_code'), 
											'company_code'=>$this->input->post('company_code'), 
											'ship_or_vendor_code'=>$this->input->post('ship_or_vendor_code'), 
											'freight_type'=>$this->input->post('freight_type'), 
											'containers_required'=>$this->input->post('containers_required'),   
											'booking_created'=>$this->input->post('booking_created'), 
											'last_updated'=>date('Y-m-d H:i:s'),
											'vendor_reference_number'=>$this->input->post('vendor_reference_number'), 
											'contact_name'=>$this->input->post('contact_name'),  
											'contant_phone'=>$this->input->post('contant_phone'), 
											'contant_fax'=>$this->input->post('contant_fax'), 
											'country_of_origin'=>$this->input->post('country_of_origin'), 
											'solid_wood_packing'=>$this->input->post('solid_wood_packing'), 
											'manufacturer'=>$this->input->post('manufacturer'), 
											'name'=>$this->input->post('name'), 
											'address_1'=>$this->input->post('address_1'), 
											'address_1'=>$this->input->post('address_2'), 
											'city'=>$this->input->post('city'), 
											'country_code'=>$this->input->post('country_code'), 
											'postal_code'=>$this->input->post('postal_code'), 
											'sipping_mark'=>$this->input->post('sipping_mark'), 
											'number_of_pallets'=>$this->input->post('number_of_pallets'), 
											'export_license_required'=>$this->input->post('export_license_required'), 
											'containers_dangerous'=>$this->input->post('containers_dangerous'), 
											'name_1'=>$this->input->post('name_1'), 
											'address_1_1'=>$this->input->post('address_1_1'), 
											'address_2_2'=>$this->input->post('address_2_2'), 
											'city_2'=>$this->input->post('city_2'), 
											'state_2'=>$this->input->post('state_2'), 
											'country_code_2'=>$this->input->post('country_code_2'), 
											'postal_code_2'=>$this->input->post('postal_code_2'), 
											'gsp_applicable'=>$this->input->post('gsp_applicable'),
											'invoice_no'=>'INV-HUB-'.(rand(10,10010000)),
											'packing_receipt_no'=>'PACK-HUB-'.(rand(10,10010000))
										);
				$where					=		array('shipment_id'=>$shipment_id);						
				$lastInsertid 			= 		$this->common->updateRecord('shipments', $data, $where);

				if($lastInsertid>0){
					$shipments			=		$this->common->getSingleRecord('shipments',$where);
					header('Content-type: application/json');
					echo json_encode($shipments);
				}
		}else {
			$error						=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	 public function download($pdf='', $shipments_id=''){ 
		if($shipments_id==''){
			$shipments_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		}else{
			$shipments_id						=		$shipments_id;
		}
	
		$user_id							=		$this->session->userdata('user_session')['id'];
		//load mPDF library
		if($pdf==1){
			$this->load->library('m_pdf');
			//load mPDF library

			//now pass the data//
			$this->data['title']="HUBWAY.";
			$this->data['description']="";
			$this->data['description']=$this->official_copies;
			 //now pass the data //
			$where								=		array('shipment_id'=>$shipments_id);
			$shipments 							= 		$this->common->getSingleRecord('shipments',$where);
			$product_to_shipments 				= 		$this->common->getRecord('product_to_shipments',$where);
			$whereuser_id						=		array('user_id'=>$user_id);
			$business_information 				= 		$this->common->getSingleRecord('business_information',$whereuser_id);

			$this->data['business_information']	=		$business_information;
			$this->data['shipments']			=		$shipments;
			$this->data['product_to_shipments']	=		$product_to_shipments;
			//$where							=		array('shipments.shipment_id'=>$shipments_id);
			//$shipments 						= 		$this->common->getRecordWithJoin();
			//$header								=		$html=$this->load->view('pdf/header',$this->data, true);
			$body								=		$html=$this->load->view('pdf/invoice1',$this->data, true);	
			//$footer								=		$html=$this->load->view('pdf/footer',$this->data, true);
			//$html								=		$header.$body.$footer;
			$html								=	$body;
			//$html=$this->load->view('step7_table',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

			//this the the PDF filename that user will get to download
			$pdfFilePath ="hubway-".time()."-invoice.pdf";

			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");
		}
		if($pdf==2){
			$this->load->library('m_pdf');
			//load mPDF library

			//now pass the data//
			$this->data['title']="HUBWAY.";
			$this->data['description']="";
			$this->data['description']=$this->official_copies;
			 //now pass the data //
			$where							=		array('shipment_id'=>$shipments_id);
			$shipments 						= 		$this->common->getSingleRecord('shipments',$where);
			$product_to_shipments 			= 		$this->common->getRecord('product_to_shipments',$where);
			$whereuser_id					=		array('user_id'=>$user_id);
			$business_information 			= 		$this->common->getSingleRecord('business_information',$whereuser_id);

			$this->data['business_information']	=		$business_information;
			$this->data['shipments']			=		$shipments;
			$this->data['product_to_shipments']	=		$product_to_shipments;
			//$where							=		array('shipments.shipment_id'=>$shipments_id);
			//$shipments 						= 		$this->common->getRecordWithJoin();

			//$header								=		$html=$this->load->view('pdf/header',$this->data, true);
			$body								=		$html=$this->load->view('pdf/invoice2',$this->data, true);	
			//$footer								=		$html=$this->load->view('pdf/footer',$this->data, true);
			$html								=		$body;
			//$html=$this->load->view('step7_table',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.

			//this the the PDF filename that user will get to download
			$pdfFilePath ="hubway-".time()."-packing_receipt.pdf";

			//actually, you can pass mPDF parameter on this load() function
			$pdf = $this->m_pdf->load();
			//generate the PDF!
			$pdf->WriteHTML($html,2);
			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
			$pdf->Output($pdfFilePath, "D");	
		}
	}
 public function printLabel($print_label='', $shipment_id=''){
		if($print_label==''){
			$print_label		=		10;
		}

		if($this->session->userdata("shipment_session")){
			$shipment_id	=	$this->session->userdata("shipment_session")["shipments_id"];
		}else{
			$shipment_id	=	$shipment_id;
		}
	
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		//$mpdf = new mPDF();

		//$mpdf->writeBarcode('978-1234-567-890');

		//$mpdf->Output();
		error_reporting(~E_NOTICE & ~E_WARNING);
	
		
		$where					=		array('shipment_id'=>$shipment_id);
		$products				=		$this->common->getRecord('product_to_shipments',$where);
		
		
		//$code = "100";
		//$bcode='<tr border-top: 1px solid #000000><div><td width="10%" style="border:1px solid black; padding:10px"><barcode code="$code" type="C39" size="1" height="2.0" /></td></div></tr>';

		$bcode		=	'';
		$count = 0;

		$bcode .= <<<EOT
						<tr>
EOT;

		foreach ($products as $product) {

			$code 				= 		$product->UPC;

			$productTitle		=		substr($product->title,0,40);
			$merchant_SKU		=		$product->merchant_SKU;
			if($product->label_to_print!="" && 	$product->label_to_print!=0){
				
				foreach (range(1, $product->label_to_print) as $i) {
					
						if($count != 0 && $count%3 == 0){
							$bcode .= <<<EOT
											</tr></br><tr>
EOT;
						}
						$bcode .= <<<EOT
										<td style="padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px; "><p align="left"><barcode code="$code" type="C39" size="1" height="1.0" /> </barcode><center>$code</center> <p style="padding-right:20px; font-size:12px;">$productTitle</p><p>$product->condition</p></p></td>
EOT;
						$count++;
				}
			}
		}
		$bcode .= <<<EOT
						</tr>
EOT;

//prepare the html
$html = <<<EOT
			<html>
				<head>
				</head>
				<body>

EOT;
					$html .=<<<EOT
					<table style="padding-left:30px; padding-right:30px; padding-top:30px; padding-bottom:30px; ">
						$bcode
					</table>
				</body>
			</html>
EOT;
//echo $html; die;
//get the mpdf library
//include("lib/MPDF54/mpdf.php");
$mpdf = new mPDF('utf-8','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
$mpdf->WriteHTML($html);
//render the pdf on the browser
//$mpdf->Output();
$pdfFilePath ="hubway-".time()."-label.pdf";
$mpdf->Output($pdfFilePath, "D");
	}
	
	
	public function printCarton($carton='', $shipment_id=''){
		if($carton==''){
			$carton		=		10;
		}
		if($this->session->userdata("shipment_session")){
			$shipment_id						=		$this->session->userdata("shipment_session")["shipments_id"];
		}else{
			$shipment_id						=		$shipment_id;
		}
		
		$where								=		array('shipment_id'=>$shipment_id);
		$shipmentdata 						= 		$this->common->getSingleRecord('shipments', $where);
		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$this->session->userdata("user_session")["id"]));
		$where1								=		array('address_id'=>$shipmentdata->address_id);
		$saveaddressDetails					=		$this->common->getSingleRecord('addresses',$where1);
		//print_r($saveaddressDetails); die;
		

		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		
		$whereid3						=		@array('id'=>$saveaddressDetails->country);
		$country 						= 		$this->common->getSingleRecord('countries', $whereid3);

		$whereid						=		@array('id'=>$saveaddressDetails->state);
		$state 							= 		$this->common->getSingleRecord('states', $whereid);

		$whereid1						=		@array('id'=>$saveaddressDetails->city);
		$city 							= 		$this->common->getSingleRecord('cities', $whereid1);

		error_reporting(~E_NOTICE & ~E_WARNING); 
		
		
		if($shipmentdata->shipping_plan_type=='Individual Products'){
			$type		=		'Mixed SKU';
			$code		=		$shipmentdata->shipping_id;
		}else{
			$type		=		'Single SKU';
			$code		=		$shipmentdata->shipping_id."/".$shipmentdata->UPC;  
		}
		
		
	if($shipmentdata->shipping_plan_type=='Casepacked Products'){
		
		$where					=		array('shipment_id'=>$shipmentdata->shipment_id);
		$products				=		$this->common->getRecord('product_to_shipments',$where);
		
		
		
		
		$html = <<<EOT
			<html>
				<head>
					<link rel="stylesheet" type="text/css"  href="http://fonts.googleapis.com/css?family=Raleway" />
					<style>
						div
						{
							margin:0px;
						}
						
					</style>
				</head>
				<body>
EOT;

foreach ($products as $product) {

$count=	1;
$code		=		$shipmentdata->shipment_id."/".$product->UPC;  
					foreach (range(1, $product->number_of_cases) as $i) {
						
						//$mpdf->AddPage();
						$html .= <<<EOT
						<table style="width:250px;border:0px solid black;padding-left:10%;margin-bottom:20px;padding-top:15%;">
 <tr>
  <td style="float:left;padding-left:2%;font-family:Raleway;">
   <div ><b>HUBWAY</b></div>
  </td>
  <td style="font-family:Raleway;padding-left:25%;">
   <div ><b>Carton $count of $carton</b></div>
  </td>
 </tr>  
 <tr>
  <td colspan="2" style="border:1px solid black;background-color:black;">
   <div></div>
  </td>
 </tr>
 <tr>
  <td style="float:left;padding-left:2%;font-family:Raleway;">
   <div >
    Ship From:
    <div style="font-size:12px;padding-top: 11px;">
     $saveaddressDetails->name
    </div>
    <div style="font-size:12px;">
     $saveaddressDetails->addressline1
    </div> 
    <div style="font-size:12px;">
     $saveaddressDetails->addressline2
    </div> 
    <div style="font-size:12px;">
     $city->name , $state->name
    </div> 
    <div style="font-size:12px;">
     $country->name
    </div>
   </div>
  </td>
  <td style="font-family:Raleway;padding-left:25%;">
   <div >
    Ship To:
    <div style="font-size:12px;padding-top: 11px;">
     FBA: G & F Products, Inc.
    </div>
    <div style="font-size:12px;">
     Amazon.com.dedc LLC
    </div> 
    <div style="font-size:12px;">
     1180 Innovation Way
    </div> 
    <div style="font-size:12px;">
     Fall River, MA 02722
    </div> 
    <div style="font-size:12px;">
     United States
    </div>
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" style="background-color: black;border: 3px solid black;color: white;font-family: Raleway;font-size: 10px;padding-left: 11px;margin-bottom: 30px;margin-top: 30px;width:500px ! improtant;">
   <div>
    $shipmentdata->shipping_id / $product->UPC
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" style="height:92px;" align="center">
   <div >
    <barcode code="$code" type="C39" size="1" height="2.0" /> 
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <div style="margin-top: 8px;">$shipmentdata->shipping_id</div>
  </td>
 </tr>
 <tr>
  <th colspan="2" style="float: right;font-family: Raleway;font-size: 11px;padding-right:15%;" align="right">
   <div >$type</div>
  </th>
 </tr>
 <tr>
  <th colspan="2" align="center" style="font-family: Raleway;font-size: 11px;">
   <div >PLEASE LEAVE THIS LABEL UNCOVERED</div>
  </th>
 </tr>
  
 
</table><pagebreak>
EOT;
$count++;
					}
					}
 
					$html .=<<<EOT
				</body>
			</html>
EOT;
		
		
	}else{
		$html = <<<EOT
			<html>
				<head>
					<link rel="stylesheet" type="text/css"  href="http://fonts.googleapis.com/css?family=Raleway" />
					<style>
						div
						{
							margin:0px;
						}
						
					</style>
				</head>
				<body>
EOT;
$count=	1;
					foreach (range(1, $carton) as $i) {
						
						//$mpdf->AddPage();
						$html .= <<<EOT
						<table style="width:250px;border:0px solid black;padding-left:10%;margin-bottom:20px;padding-top:15%;">
 <tr>
  <td style="float:left;padding-left:2%;font-family:Raleway;">
   <div ><b>HUBWAY</b></div>
  </td>
  <td style="font-family:Raleway;padding-left:25%;">
   <div ><b>Container $count of $carton</b></div>
  </td>
 </tr>  
 <tr>
  <td colspan="2" style="border:1px solid black;background-color:black;">
   <div></div>
  </td>
 </tr>
 <tr>
  <td style="float:left;padding-left:2%;font-family:Raleway;">
   <div >
    Ship From:
    <div style="font-size:12px;padding-top: 11px;">
     $saveaddressDetails->name
    </div>
    <div style="font-size:12px;">
     $saveaddressDetails->addressline1
    </div> 
    <div style="font-size:12px;">
     $saveaddressDetails->addressline2
    </div> 
    <div style="font-size:12px;">
     $city->name , $state->name
    </div> 
    <div style="font-size:12px;">
     $country->name
    </div>
   </div>
  </td>
  <td style="font-family:Raleway;padding-left:25%;">
   <div >
    Ship To:
    <div style="font-size:12px;padding-top: 11px;">
     FBA: G & F Products, Inc.
    </div>
    <div style="font-size:12px;">
     Amazon.com.dedc LLC
    </div> 
    <div style="font-size:12px;">
     1180 Innovation Way
    </div> 
    <div style="font-size:12px;">
     Fall River, MA 02722
    </div> 
    <div style="font-size:12px;">
     United States
    </div>
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" style="background-color: black;border: 3px solid black;color: white;font-family: Raleway;font-size: 10px;padding-left: 11px;margin-bottom: 30px;margin-top: 30px;width:500px ! improtant;">
   <div>
     $shipmentdata->shipping_id / $product->UPC
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" style="height:92px;" align="center">
   <div >
    <barcode code="$code" type="C39" size="1" height="2.0" /> 
   </div>
  </td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <div style="margin-top: 8px;">$shipmentdata->shipping_id</div>
  </td>
 </tr>
 <tr>
  <th colspan="2" style="float: right;font-family: Raleway;font-size: 11px;padding-right:15%;" align="right">
   <div >$type</div>
  </th>
 </tr>
 <tr>
  <th colspan="2" align="center" style="font-family: Raleway;font-size: 11px;">
   <div >PLEASE LEAVE THIS LABEL UNCOVERED</div>
  </th>
 </tr>
  
 
</table><pagebreak>
EOT;
$count++;
					}
 
					$html .=<<<EOT
				</body>
			</html>
EOT;
		
	}	
		
		
		//$code = "100";
//prepare the html

//echo $html; die('------------');
//get the mpdf library
//include("lib/MPDF54/mpdf.php");
$mpdf = new mPDF('utf-8','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
$mpdf->WriteHTML($html);
//render the pdf on the browser
//$mpdf->Output();
$pdfFilePath ="hubway-".time()."-carton.pdf";
$mpdf->Output($pdfFilePath, "D");
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
				$this->layout->view('viewShipment', $data);

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
				$this->layout->view('viewShipment', $data);

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
				$this->layout->view('viewShipment', $data);

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
				$this->layout->view('viewShipment', $data);
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
			$this->layout->view('viewShipment', $data);
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
					$this->layout->view('viewShipment', $data);

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
					$this->layout->view('viewShipment', $data);
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
			$this->layout->view('viewShipment', $data);
		}
	}
}
/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */