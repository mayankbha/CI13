<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Order extends MY_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function index(){
		//When page refress cleare order session
		$this->session->unset_userdata('order_session');
		
		$user_id		=		$this->session->userdata("user_session")["id"];	
		
		$array 			= 		array('user_id'=>$user_id);
		$saveaddressDetails_id 				= 		$this->common->getSingleRecord('user', array('id'=>$user_id));
		$data['saveaddressDetails_id']		=		$saveaddressDetails_id->address_id;
		$where								=		array('address_id'=>$saveaddressDetails_id->address_id);
		$saveaddressDetails					=		$this->common->getSingleRecord('addresses',$where);
		if(!empty($saveaddressDetails)){  
			$data['saveaddressDetails']		=		$saveaddressDetails;
		}else{
			$data['saveaddressDetails']		=		'';
		}

		$addAddressDetails 				= 		$this->common->getRecordOrder('addresses',$array);
		$country 						= 		$this->common->getRecord('countries');
		$data['inventoryData']			= 		$this->common->getRecord('inventory_data');
		$array							=		array('user_id'=>$user_id, 'order_type'=>2, 'order_status'=>1);
		$data['exist_orders']			=		$this->common->getRecordWithJoinuserOrder($array);
		
		$data['allcountry']  			= 		$country;
		$data['addAddressDetails'] 		= 		$addAddressDetails;


		$this->layout->title('Create Order | Hubway');
		$this->layout->view('create_order',$data);
	}
	
	public function view_order(){
		$user_id				=	$this->session->userdata("user_session")["id"];
		$array = array(
			'user_id'=>$user_id
		);
		$data['all_orders']		=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'user_id'=>$user_id,
			'order_type'=>2
		);
		$data['fba_orders']		=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'user_id'=>$user_id,
			'order_type'=>3
		);
		$data['local_fullfill_order']	=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'user_id'=>$user_id,
			'order_type'=>4
		);
		$data['disposal_orders']		=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');
		
		
		$array = array(
			'user_id'=>$user_id,
			'order_type'=>1
		);
		$data['shipstation_orders']		=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$this->layout->title('View Order | Hubway');
		$this->layout->view('vieworder',$data);
	}

	public function view_order_details($order_id){
		$where = array(
			'order_id'=>$order_id 
		);
		$orders						=		$this->common->getSingleRecord('orders', $where);

		$data['orders']				=		$orders;
		$data['address']			=		$this->common->getSingleRecord('addresses', array('address_id'=>$orders->ship_to_address_id ));
		$data['products']			=		$this->common->getRecord('product_to_order', $where);
		$this->layout->title('View Order Details | Hubway');
		$this->layout->view('view_order_details',$data);
	}

	public function create_order(){
		if($this->input->post('crete_order') && $this->input->post('order_name')){
			$this->session->unset_userdata('order_session');
			$where			=		array('address_id'=>$this->input->post('address_id'));
			$address		=		$this->common->getSingleRecord('addresses',$where);

			$w3				=		array('id'=>$address->country);
			$country 		= 		$this->common->getSingleRecord('countries', $w3);

			$w2				=		array('id'=>$address->state);
			$state 			= 		$this->common->getSingleRecord('states', $w2);

			$w1				=		array('id'=>$address->city);
			$city 			= 		$this->common->getSingleRecord('cities', $w1);
		

			$date 			= 		date('Y-m-d H:i:s');
			$data			=		array(
										'customer_name'			=>	$address->name,
										'shipto_recipientname'	=>	$address->name,
										'shipto_addressline1'	=>	$address->addressline1,
										'shipto_addressline2'	=>	$address->addressline2,
										'shipto_country'		=>	$country->name,
										'shipto_state'			=>	$address->name,
										'shipto_city'			=>	$city->name,
										'shipto_zip'			=>	$address->zipcode,
										'shipto_contactoffice'	=>	$address->contactoffice,
										'shipto_contactphone'	=>	$address->contactmobile,
										'order_name'			=>	$this->input->post('order_name'),
										'user_id'				=>	$this->session->userdata("user_session")["id"] ,
										'createdate'			=>	$date, 
										'packing_types'			=>	$this->input->post('packing_types'),
										'ship_to_address_id'	=>	$this->input->post('address_id'),
										'order_shipby'			=>	date('Y-m-d',strtotime($this->input->post('order_shipby'))),
										'order_status'			=>1,
										'order_type'			=>2,
										'step'					=>1
									);

			$lastInsertid 					= 		$this->common->saveRecord('orders', $data);
			if($lastInsertid>0){
				$order_session 				= 		array(
														'order_id' => 	$lastInsertid,
														'order_number' =>'HUB-ORDR-100100'.$lastInsertid,
														'logged_in' => TRUE
													);
				$this->session->set_userdata('order_session', $order_session);
				$where_order					=		array('order_id'=>$lastInsertid);
				$datas							=		array('order_number'=>'HUB-ORDR-100100'.$lastInsertid);
				$update 						= 		$this->common->updateRecord('orders', $datas, $where_order);
				$order 							= 		$this->common->getSingleRecord('orders', $where_order);
				header('Content-type: application/json');
				echo json_encode($order);
			}
		}
	}
	
	public function checkOrderName(){
		if($this->input->post('checkOrderName')){
			$where							=		array('order_name'=>$this->input->post('order_name'));
			$existing_order_number 			= 		$this->common->getRecordCount('orders', $where);
			
			if($existing_order_number>0){
				$array						=		array('order_name'=>$this->input->post('order_name'),'check'=>1);
						
				header('Content-type: application/json');
				echo json_encode($array);
			}else{
				if($this->session->userdata('order_session')){
					$where					=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
					$datas							=		array('order_name'=>$this->input->post('order_name'));
					$update 						= 		$this->common->updateRecord('orders', $datas, $where);
				}	
				$success					=		array('success'=>'updated');
				header('Content-type: application/json');
				echo json_encode($success);
			}
		}
	}
	
	public function checkproductCost($id=null){
		if($id!=null){
			$where								=		array('inventory_id'=>$id);
			$costCount 							= 		$this->common->getSingleRecord('inventory_data',$where);
			if(!empty($costCount)){
				header('Content-type: application/json');
				echo json_encode($costCount->cost);
			}
		}
	}

	public function completeOrder($id=null){
		if($this->input->post('order_id')){
			$where								=		array('order_id'=>$this->input->post('order_id'));
			$orders 							= 		$this->common->getSingleRecord('orders',$where);
			if(!empty($orders)){
				$order_session 					= 		array(
														'order_id' 		=> 	$orders->order_id,
														'order_number' 	=>	$orders->order_number,
														'logged_in'		=> 	TRUE
													);
							
				$items=		$this->common->getRecord('product_to_order', $where);
				if(!empty($items)){
					foreach($items as  $item) {
						$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
						//$quantity  = $redata->total_received - $item->quantity;
						if($item->quantity > $redata->total_received){
							$quantity		=	$redata->total_received;
							$resData	=	array('quantity' => $quantity);
							$ins_id = 	$this->common->updateRecord('product_to_order', $resData, array('productId' =>$item->productId));
						}
					}
				}
				$this->session->set_userdata('order_session', $order_session);
				header('Content-type: application/json');
				echo json_encode($orders);
				
			}
		}
	}

	public function updateOrder(){ 
		
		if($this->input->post('addProduct')){
			$where								=		array('inventory_data.inventory_id'=>$this->input->post('product_id'));
			$inventory 						= 		$this->common->getRecordWithJoinReceivedItem($where);
			if(!empty($inventory)){
				$inventoryData		=	$inventory[0];
				$itemHeight		=	$inventoryData->Height;
				$itemLength		=	$inventoryData->Length;
				$itemWidth		=	$inventoryData->Width;
				
				$totaldim		=	$itemHeight*$itemLength*$itemWidth;
				
				
				
				$product	    =		array(
							//'customer_id'=>$this->session->userdata("user_session")["id"],
							'productId'=>$inventoryData->inventory_id,												
							'sku'=>$inventoryData->merchant_SKU ,
							'item_name'=>$inventoryData->title , 
							'order_id'=>$this->session->userdata("order_session")["order_id"],
							'condition'=>$inventoryData->condition,
							//'cost'=>$inventoryData->cost,
							'unitPrice'=>$inventoryData->price,
							'in_stock'=>$inventoryData->total_received,
							'item_image'=>$inventoryData->item_image_url,
							'ean'=>$inventoryData->EAN,
							//'quantity'=>$inventoryData->quantity,
							'createDate'=>date('Y-m-d H:i:s'),
							'Height'=>$inventoryData->Height,
							'Length'=>$inventoryData->Length,
							'Weight'=>$inventoryData->Weight,
							'Width'=>$inventoryData->Width,
							'item_dimension'=>$totaldim,
							'upc'=>$inventoryData->UPC
						);
				$lastInsid 						= 		$this->common->saveRecord('product_to_order', $product);
			}
		}

		if($this->input->post('updateQuantity') && $this->input->post('item_id')){
			$data							=		array('quantity' =>$this->input->post('quantity'));
			$where							=		array('item_id' => $this->input->post('item_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_order', $data, $where);

			if($lastInsertid>0){
	
				$item 						= 		$this->common->getSingleRecord('product_to_order', $where);
				
				$outBound					=		0.22*$item->item_dimension*$item->quantity;
				
				$where						=		array('item_id' => $this->input->post('item_id'));
				$data						=		array('outbound_charge' =>$outBound);
				$lastInsert					= 		$this->common->updateRecord('product_to_order', $data, $where);
				if($lastInsert){
					//sleep(1);
					$where	=	array('order_id'=>$this->session->userdata("order_session")["order_id"]);
					$products = $this->common->getRecord('product_to_order', $where);
					$total					=		$this->common->getSumOfItemCustom('product_to_order','quantity', $where);
					$totaloutbound = number_format($total->totaloutbound, 2);

					$data					=		array(
															'unit' =>$total->unit,
															'sku' =>count($products),
															'quantity' =>$total->unit, 
															'totalqubicft' =>$total->totaldimension, 
															'totaloutbound' =>$totaloutbound
														);

					$where					=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
					$lastInsertid 			= 		$this->common->updateRecord('orders', $data, $where);

					$message				=		array(
															'unit' =>$total->unit, 
															'totalqubicft' =>$total->totaldimension, 
															'outBound' =>$outBound,
															'item_dimension' =>$item->item_dimension,
															'Item_quantity' =>$item->quantity,
															'Item_charge' =>0.22,
															'totaloutbound' =>$totaloutbound
														);
						header('Content-type: application/json');
						echo json_encode($message);
				}
			}else{
				$message	=		array('error' =>"error");
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('updateCases') && $this->input->post('item_id')){

			$data							=		array(
															'quantity' =>$this->input->post('quantity'),
															'number_of_cases' =>$this->input->post('number_of_cases'),
															'unit_per_case' =>$this->input->post('unit_per_case')
														);
			$where							=		array('item_id' => $this->input->post('item_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_order', $data, $where);
			if($lastInsertid>0){
				$item 						= 		$this->common->getSingleRecord('product_to_order', $where);
				
				$outBound					=		0.22*$item->item_dimension*$item->number_of_cases;
				
				$where						=		array('item_id' => $this->input->post('item_id'));
				$data						=		array('outbound_charge' =>$outBound);
				$lastInsert					= 		$this->common->updateRecord('product_to_order', $data, $where);
				if($lastInsert>0){
					//sleep(1);
					$where					=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
					$products = $this->common->getRecord('product_to_order', $where);
					$total					=		$this->common->getSumOfItemCustom('product_to_order','number_of_cases', $where);
					$totaloutbound = number_format($total->totaloutbound, 2);

					$data					=		array(	
															'unit' =>$total->unit,
															'sku' =>count($products),
															'quantity' =>$total->unit, 
															'totalqubicft' =>$total->totaldimension, 
															'totaloutbound' =>$totaloutbound
														);

					$where	=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
					$lastInsertid 			= 		$this->common->updateRecord('orders', $data, $where);

					$message	=	array(
									'unit' =>$total->unit, 
									'totalqubicft' =>$total->totaldimension, 
									'outBound' =>$outBound,
									'item_dimension' =>$item->item_dimension,
									'Item_quantity' =>$item->number_of_cases,
									'Item_charge' =>0.22,
									'totaloutbound' =>$totaloutbound
								);
						header('Content-type: application/json');
						echo json_encode($message);
				}
			}else{
				$message	=		array('error' =>"error");
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}

		if($this->input->post('deleteImage') && $this->input->post('imagename')){
			$coloumn		=		$this->input->post('colunmname');
			$imagename		=		$this->input->post('imagename');
			$where			=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
			$orders			=		$this->common->getSingleRecord('orders',$where);

			$images			=		explode(",", $orders->$coloumn);

			foreach($images as  $key => $image) {
				if ($image==$imagename) {
					unset($images[$key]);
				}
			}

			$all_image		=		implode(",",$images);	
            $insert 		= 		$this->common->insertImages('orders', $where, array("$coloumn"=>$all_image));
			if($insert){
				echo 1;
			}else{
				echo 0;
			}
		}
		
		if($this->input->post('deleteItem')){	
			$order_id					=		$this->session->userdata("order_session")["order_id"];
			$response 						= 		$this->common->deleteRecord('product_to_order', 'productId', $this->input->post('item'));
			if($response>0){
				$where							=		array('order_id'=>$order_id); 
				$products 						= 		$this->common->getRecord('product_to_order',$where);
				header('Content-type: application/json');
				echo json_encode($products);
			}else{
				$error					=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}	

		if($this->input->post('updateLabel') && $this->input->post('item_id')){
			$data							=		array('item_label' =>$this->input->post('label'),'label_cost'=>$this->input->post('label_cost'));
			$where							=		array('item_id' => $this->input->post('item_id'));
			$lastInsertid 					= 		$this->common->updateRecord('product_to_order', $data, $where);

			if($lastInsertid>0){
				$where								=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
				$total			=		$this->common->getSumOfItem('product_to_order','item_label', $where);
				header('Content-type: application/json');
				echo json_encode($total);
			}
		}
		
		if($this->input->post('cartonUpdate') && $this->input->post('carton')){
			$data			=		array('carton' =>$this->input->post('carton'));
			$where			=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
			$lastInsertid 	= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$msg =		array('carton' => "save carton success");
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}
		
		if($this->input->post('track_orderUpdate') && $this->input->post('track_order')){
			$data			=		array('track_order' =>$this->input->post('track_order'));
			$where			=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
			$lastInsertid 	= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$msg =		array('track_order' => "save track_order success");
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}

		if($this->input->post('updateStep') && $this->input->post('step')){
			$data							=		array('step'=>$this->input->post('step'));
			$where							=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
			$lastInsertid 					= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Order' =>'Updated step');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}
		
		if($this->input->post('cancelOrder') && $this->input->post('order_id')){
			$where							=		array('order_id'=>$this->input->post('order_id'));
			$data							=		array('order_status' => 0);
			$lastInsertid 					= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Order' =>'deleted');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}
		
		
		
		if($this->input->post('changePackingtypes')){	
			$where							=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
			$orders 						= 		$this->common->getSingleRecord('orders', $where);
			$items 							= 		$this->common->getRecord('product_to_order', $where);

			if($orders->packing_types == 1){
				$plan			=		2;
				
				if(!empty($items)){
					foreach($items as $key=> $item) {
						$outBound					=		0.22*$item->item_dimension*$item->number_of_cases;
						$where						=		array('item_id' =>$item->item_id);
						$data						=		array('outbound_charge' =>$outBound);
						$lastInsert					= 		$this->common->updateRecord('product_to_order', $data, $where);
					}
				}
				$where								=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
				$total			=		$this->common->getSumOfItemCustom('product_to_order','number_of_cases', $where);
			}else{
				
				if(!empty($items)){
					foreach($items as $key=> $item) {
						$outBound					=		0.22*$item->item_dimension*$item->quantity;
						$where						=		array('item_id' =>$item->item_id);
						$data						=		array('outbound_charge' =>$outBound);
						$lastInsert					= 		$this->common->updateRecord('product_to_order', $data, $where);
					}
				}
				$where								=		array('order_id' => $this->session->userdata("order_session")["order_id"]);

				$total			=		$this->common->getSumOfItemCustom('product_to_order','quantity', $where);
				$plan						=		1;
			}
			
			//print_r($total); 

			$data							=		array('packing_types'=>$plan);
			$lastid 						= 		$this->common->updateRecord('orders', $data, $where);	
			if($lastid>0){
				$totaloutbound = number_format($total->totaloutbound, 2);
				$data						=		array(
														'unit' =>$total->unit, 
														'totalqubicft' =>$total->totaldimension, 
														'totaloutbound' =>$totaloutbound
													);

				$where						=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$lastInsertid 				= 		$this->common->updateRecord('orders', $data, $where);
				$ordersData 				= 		$this->common->getSingleRecord('orders', $where);
				header('Content-type: application/json');
				echo json_encode($ordersData);
			}else{
				$error						=		array('error'=>'error in update Packingtypes');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}

		if($this->input->post('updateExistingOrder') && $this->input->post('order_id')){
			$this->session->unset_userdata('order_session');
			$exist_order_id			=		$this->input->post('order_id');
			$where					=		array('order_id'=>$exist_order_id);
			$order					=		$this->common->getSingleRecord('orders',$where);

			if(!empty($order)){
				$order_session 		= 		array(
												'order_id' => 	$order->order_id,
												'order_number' =>$order->order_number,
												'logged_in' => TRUE
											);
				$this->session->set_userdata('order_session', $order_session);
				
				$data					=		array(	'order_name' =>$this->input->post('order_name'),
														'order_type'=>$this->input->post('order_type'),
														'order_shipby'=>date('Y-m-d',strtotime($this->input->post('order_shipby')))
													);
				$where					=		array('order_id' => $this->input->post('order_id'));
				$lastInsertid 			= 		$this->common->updateRecord('orders', $data, $where);
				if($lastInsertid>0){
					$message			=		array('Order' =>'Updated ExistingOrder');
					header('Content-type: application/json');
					echo json_encode($message);
				}
			}
		}
		if($this->input->post('saveOrder') && $this->input->post('order_status')){
			
			$where			=		array('order_id' => $this->session->userdata("order_session")["order_id"]);
			$orders 		= 		$this->common->getSingleRecord('orders', $where);
			$address 		= 		$this->common->getSingleRecord('addresses', array('address_id' =>$orders->ship_to_address_id));
			$products 		= 		$this->common->getRecord('product_to_order', $where);
			$labelcost		=		$this->common->getSumOfItem('product_to_order', 'label_cost', $where);
			
			
			//for countory city state
			$whereid3		=		array('id'=>$address->country);
			$country 		= 		$this->common->getSingleRecord('countries', $whereid3);
	
			$whereid		=		array('id'=>$address->state);
			$state 			= 		$this->common->getSingleRecord('states', $whereid);

			$whereid1		=		array('id'=>$address->city);
			$city 			=		$this->common->getSingleRecord('cities', $whereid1);

			$totaloutbound	=		$orders->totaloutbound;
			//$no_of_pallets	=		$orders->no_of_pallets*8;
			$orders_total	=		$orders->totaloutbound+$labelcost->total;

			$order_id		=		$this->session->userdata("order_session")["order_id"];
			$data			=		array(
											'customer_name'			=>	$address->name,
											'shipto_recipientname'	=>	$address->name,
											'shipto_companyname'	=>	'',
											'shipto_addressline1'	=>	$address->addressline1,
											'shipto_addressline2'	=>	$address->addressline2,
											'shipto_country'		=>	$country->name,
											'shipto_state'			=>	$state->name,
											'shipto_city'			=>	$city->name,
											'shipto_contactoffice'	=>	$address->contactoffice,
											'shipto_contactphone'	=>	$address->contactmobile,
											'shipto_zip'			=>	$address->zipcode,
											'order_status'			=>	$this->input->post('order_status'),
											'track_order' 			=>	$this->input->post('track_order'),
											'sku' 					=>	count($products),
											'order_total' 			=>	$orders_total,
											'order_shipby' 			=>	date('Y-m-d',strtotime($this->input->post('order_shipby')))
										);
			$where			=		array('order_id' => $order_id);
			$lastInsertid 	= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				
				foreach($products as  $item) {
					$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
					$received  = $redata->total_received - $item->quantity;
					$resData	=	array('total_received' => $received);
					$ins_id = 	$this->common->updateRecord('warehouse_shipping_receiving', $resData, array('product_id' =>$item->productId));
				}

				$this->session->unset_userdata('order_session');
				$message					=		array('Order' =>'Save Order Successfully');
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}
		
		
		
        $data = array();
        if(@$_FILES['label']){
			
            $filesCount = count($_FILES['label']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['label']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['label']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['label']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['label']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['label']['size'][$i];

                $uploadPath = 'uploads/label';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[]		= 	$fileData['file_name'];
                    //$uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    //$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
 
            if(!empty($uploadData)){
				$where			=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$orders			=		$this->common->getSingleRecord('orders',$where);
				if(!empty($orders->label_images)){
					$label_image	=		implode(",",$uploadData);
					$all_label_images		=  $orders->label_images .','.$label_image;
					
				}else{
					$label_image	=		implode(",",$uploadData);
					$all_label_images		=  $label_image;
				}
							
                $insert = $this->common->insertImages('orders', $where, array('label_images'=>$all_label_images));
				if($insert){
					$message					=		array('File' =>'Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}else{
					$message					=		array('File' =>'Not Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}
            }
        }

		$data = array();
        if(@$_FILES['carton']){ 
			
            $filesCount = count($_FILES['carton']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['carton']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['carton']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['carton']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['carton']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['carton']['size'][$i];

                $uploadPath = 'uploads/carton';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[] = $fileData['file_name'];
                    //$uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    //$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
 
            if(!empty($uploadData)){
                $where			=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$orders			=		$this->common->getSingleRecord('orders',$where);
				
				if(!empty($orders->carton_images)){
					$carton_image			=		implode(",",$uploadData);
					$all_carton_images		=  $orders->carton_images .','.$carton_image;
				}else{
					$carton_image	=		implode(",",$uploadData);
					$all_carton_images		=  $carton_image;
				}
				
			
                $insert = $this->common->insertImages('orders', $where, array('carton_images'=>$all_carton_images));
				if($insert){
					$message					=		array('File' =>'Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}else{
					$message					=		array('File' =>'Not Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}
            }
        }
		
		$data = array();
        if(@$_FILES['shipping_label']){
			
            $filesCount = count($_FILES['shipping_label']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['shipping_label']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['shipping_label']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['shipping_label']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['shipping_label']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['shipping_label']['size'][$i];

                $uploadPath = 'uploads/shipping_label';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[] = $fileData['file_name'];
                   // $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    //$uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }
 
            if(!empty($uploadData)){ 
				$where			=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$orders			=		$this->common->getSingleRecord('orders',$where);	
				
				if(!empty($orders->shipping_label_images)){
					$shipping_labels			=		implode(",",$uploadData);
					$all_shipping_label_images		=  $orders->shipping_label_images .','.$shipping_labels;
				}else{
					$shipping_labels	=		implode(",",$uploadData);
					$all_shipping_label_images		=  $shipping_labels;
				}
				
							
				
                $insert = $this->common->insertImages('orders', $where, array('shipping_label_images'=>$all_shipping_label_images));
				if($insert){
					$message					=		array('File' =>'Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}else{
					$message					=		array('File' =>'Not Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}
            }
        }
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
				
				if($this->session->userdata("order_session")){
					$shdata			=	array('customer_name'	=>	$addressData->name,
											'shipto_recipientname'	=>	$address->name,
											'shipto_companyname'	=>	'',
											'shipto_addressline1'	=>	$addressData->addressline1,
											'shipto_addressline2'	=>	$addressData->addressline2,
											'shipto_country'		=>	$country->name,
											'shipto_state'			=>	$state->name,
											'shipto_city'			=>	$city->name,
											'shipto_contactoffice'	=>	$addressData->contactoffice,
											'shipto_contactphone'	=>	$addressData->contactmobile,
											'shipto_zip'			=>	$addressData->zipcode,
											'ship_to_address_id' 	=>$this->input->post('id')
										);
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
	

	public function add_to_an_existing_order(){
		if($this->input->post('add_exist_exist_order')){
			$exist_order_id			=		$this->input->post('exist_order_id');
			$where					=		array('order_id'=>$exist_order_id);

			$items=		$this->common->getRecord('product_to_order', $where);
			foreach($items as  $item) {
				$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
				//$quantity  = $redata->total_received - $item->quantity;
				if($item->quantity >  $redata->total_received){
					$quantity		=	$redata->total_received;
					$resData	=	array('quantity' => $quantity);
					$ins_id = 	$this->common->updateRecord('product_to_order', $resData, array('productId' =>$item->productId));
				}
			}
			
			$data['items']			=		$this->common->getRecord('product_to_order',$where);
			$this->load->view('steps/order/order_step1_table', $data);
		}else{
			$error					=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	public function getOrderProduct(){
		$order_id				=		$this->session->userdata("order_session")["order_id"];
		$where					=		array('order_id'=>$order_id);
		$products 				= 		$this->common->getRecord('product_to_order',$where);
		header('Content-type: application/json');
		echo json_encode($products);
	}

	public function getOrder($order_id){
		$order_id				=		$order_id;
		if($order_id!=null){
			$where					=		array('order_id'=>$order_id);
			$order 					= 		$this->common->getSingleRecord('orders',$where);
			header('Content-type: application/json');
			echo json_encode($order);
		}
	}

	public function getorderStep($step=null){
		$order_id				=		$this->session->userdata("order_session")["order_id"];
		if($step!=null){

			if($step==1){
				$exist_order_number		=		$this->input->post('exist_order');
				$where					=		array('order_number'=>$exist_order_number);
				$existorder				=		$this->common->getRecord('orders',$where);
				$data['orders']			=		$existorder;
				$this->load->view('steps/order/order_step1_table', $data);
			}
			
			if($step==2){
				
				if($order_id!=null){
					$where		=		array('order_id'=>$order_id);
					$data		=		array('step'=>$step);
					$update 	= 		$this->common->updateRecord('orders', $data, $where);
				}			
				$where					=		array('order_id'=>$order_id);
				$data['order']			=		$this->common->getSingleRecord('orders',$where);
				$data['existorderProduct']	=	$this->common->getRecord('product_to_order',$where);
				$whereis		=		array('warehouse_shipping_receiving.total_received >'=>0);
				$data['inventoryData']	= 		$this->common->getRecordWithJoinReceivedItem($whereis);
				$this->load->view('steps/order/order_step2_table', $data);
			}
			
			if($step==3){
				if($order_id!=null){
					$where		=		array('order_id'=>$order_id);
					$data		=		array('step'=>$step);
					$update 	= 		$this->common->updateRecord('orders', $data, $where);
				}
				$where					=		array('order_id'=>$order_id);
				$orders					=		$this->common->getSingleRecord('orders',$where);
				$data['saveaddressDetails']			=		$this->common->getSingleRecord('addresses', array('address_id'=>$orders->ship_to_address_id));
				$data['order']			=		$orders;
				$data['items']			=		$this->common->getRecord('product_to_order',$where);
				$this->load->view('steps/order/order_step3_table', $data);
				
			}
			
			if($step==4){
				if($order_id!=null){
					$where		=		array('order_id'=>$order_id);
					$data		=		array('step'=>$step);
					$update 	= 		$this->common->updateRecord('orders', $data, $where);
				}
				$where					=		array('order_id'=>$order_id);
				
				$orders					=		$this->common->getSingleRecord('orders',$where);
				$data['saveaddressDetails']			=		$this->common->getSingleRecord('addresses',array('address_id'=>$orders->ship_to_address_id));
				$data['order']			=		$orders;
				$data['items']			=		$this->common->getRecord('product_to_order',$where);
				$this->load->view('steps/order/order_step4_table', $data);
			}
			
			if($step==5){
				if($order_id!=null){
					$where		=		array('order_id'=>$order_id);
					$data		=		array('step'=>$step);
					$update 	= 		$this->common->updateRecord('orders', $data, $where);
				}
				$where					=		array('order_id'=>$order_id);
				
				$orders					=		$this->common->getSingleRecord('orders',$where);
				$data['saveaddressDetails']			=		$this->common->getSingleRecord('addresses',array('address_id'=>$orders->ship_to_address_id));
				$data['order']			=		$orders;
				$data['items']			=		$this->common->getRecord('product_to_order',$where);
				$this->load->view('steps/order/order_step5_table', $data);
			}

		}else{
			$error					=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	public function deleteRecord() { 
		$table 		= $this->input->post('table');
		$column 	= $this->input->post('column');
		$value 		= $this->input->post('value');
		$response 	= $this->common->deleteRecord($table, $column, $value);

		if($column=='item_id' &&  $table=='product_to_order'){

				$where						=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);

				$orsers						=		$this->common->getSingleRecord('orders',$where);
				if(!empty($orsers)  && $orsers->packing_types==1){
					$totalquantity		=		$this->common->getSumOfItem('product_to_order', 'quantity', $where);
				}else{
					$totalquantity		=		$this->common->getSumOfItem('product_to_order', 'number_of_cases', $where);
				}

				$totalqubicft				=		$this->common->getSumOfItem('product_to_order', 'item_dimension', $where);

				$totaloutbound				=		$totalqubicft->total*$totalquantity->total*0.22;

				$data						=		array(
														'unit' =>$totalquantity->total,
														'quantity' =>$totalquantity->total, 														
														'totalqubicft' =>$totalqubicft->total, 
														'totaloutbound' =>$totaloutbound
													);
				$where						=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$lastInsertid 				= 		$this->common->updateRecord('orders', $data, $where);
		}

		echo $response;
	}

	public function input_roll($add_more_line_items_count)
	{
		$data['add_more_line_items_count'] = $add_more_line_items_count;

		$this->load->view('input_roll', $data);
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
	
//--------------------------------Order type local fullfill order fuction ----------------------
	
	public function createOrder(){ 
		if($this->input->post('order_id')){ 
			if($this->input->post('check_process')==1){

				//Get countory city state
				$order_status	=	2;

				$w1				=		array('id'=>$this->input->post('buyer_country'));
				$buyer_country 	= 		$this->common->getSingleRecord('countries', $w1);
				
				$bcountry		=		$buyer_country->name;	

				$w2				=		array('id'=>$this->input->post('buyer_state'));
				$buyer_state 	= 		$this->common->getSingleRecord('states', $w2	);
				
				$bstate			=		$buyer_state->name;	

				$w3				=		array('id'=>$this->input->post('buyer_city'));
				$buyer_city 	=		$this->common->getSingleRecord('cities', $w3	);
				
				$bcity			=		$buyer_city->name;	

			}else{
				$order_status	=	1;
				$bcountry		=	$this->input->post('buyer_country');
				$bstate			=	$this->input->post('buyer_city');
				$bcity			=	$this->input->post('buyer_state');
				
				$shcountory		=	$this->input->post('shipto_country');
				$shstate		=	$this->input->post('shipto_state');
				$shcity			=	$this->input->post('shipto_city');
			}

			if($this->input->post('coupon_question')=="on"){
				$recipientname 	=  	$this->input->post('buyer_recipientname');
				$companyname	=	$this->input->post('buyer_companyname');
				$addressline1	=	$this->input->post('buyer_addressline1');
				$addressline2	=	$this->input->post('buyer_addressline2');
				$country		=	$bcountry;
				$state			=	$bstate;
				$city			=	$bcity;
				$zip			=	$this->input->post('buyer_zip');
				$contactoffice	=	$this->input->post('buyer_contactoffice');
				$contactphone	=	$this->input->post('buyer_contactphone');
				$email			=	$this->input->post('buyer_email');
			}else{

				if($this->input->post('check_process')==1){
					$wh1			=		array('id'=>$this->input->post('shipto_country'));
					$country 		= 		$this->common->getSingleRecord('countries', $wh1);
					
					$shcountory		=		$country->name;

					$wh2			=		array('id'=>$this->input->post('shipto_state'));
					$state 			= 		$this->common->getSingleRecord('states', $wh2);

					$shstate		=		$state->name;
					
					$wh3			=		array('id'=>$this->input->post('shipto_city'));
					$city 			=		$this->common->getSingleRecord('cities', $wh3);
					
					$shcity			=		$city->name;
				}else{
					$shcountory		=	$this->input->post('shipto_country');
					$shstate		=	$this->input->post('shipto_state');	
					$shcity			=	$this->input->post('shipto_city');
				}
				

				
				$recipientname 	=  	$this->input->post('shipto_recipientname');
				$companyname	=	$this->input->post('shipto_companyname');
				$addressline1	=	$this->input->post('shipto_addressline1');
				$addressline2	=	$this->input->post('shipto_addressline2');
				$country		=	$shcountory;
				$state			=	$shstate;
				$city			=	$shcity;
				$zip			=	$this->input->post('shipto_zip');
				$contactoffice	=	$this->input->post('shipto_contactoffice');
				$contactphone	=	$this->input->post('shipto_contactphone');
				$email			=	$this->input->post('shipto_email');
			}

			
			
			$data	= array(

			//Basic details
					'user_id'=>			$this->session->userdata('user_session')['id'],
					'order_number'=>	$this->input->post('order_number'),
					'order_date'=>		date('Y-m-d',strtotime($this->input->post('order_date'))),
					'order_status'=>	$order_status,
					'order_type'=>		3,
					'paid_date'=>		$this->input->post('paid_date'),
					'shipping_paid'=>	$this->input->post('shipping_paid'),
					'tax_paid'=>		$this->input->post('tax_paid'),
					'amount_paid'=>		$this->input->post('amount_paid'), 
					'customer_field_1'=>$this->input->post('customer_field_1'), 
					'customer_field_2'=>$this->input->post('customer_field_2'), 
					
					'buyer_note'=>		$this->input->post('buyer_note'), 
					'customer_note'=>	$this->input->post('customer_note'), 
					'gift_note'=>		$this->input->post('gift_note'), 
					'internet_note'=>	$this->input->post('internet_note'), 
					'order_shipby'=>	date('Y-m-d',strtotime($this->input->post('ship_by'))), 
					'hold_untill'=>		date('Y-m-d',strtotime($this->input->post('hold_untill'))),
			//Buyer details
					'buyer_recipientname'=>  	$this->input->post('buyer_recipientname'),
					'customer_name'=>  			$this->input->post('buyer_recipientname'),
					'buyer_companyname'=>		$this->input->post('buyer_companyname'),
					'buyer_addressline1'=>		$this->input->post('buyer_addressline1'),
					'buyer_addressline2'=>		$this->input->post('buyer_addressline2'),
					'buyer_country'=>			$bcountry,
					'buyer_state'=>				$bstate,
					'buyer_city'=>				$bcity,
					'buyer_zip'=>				$this->input->post('buyer_zip'),
					'buyer_contactoffice'=>		$this->input->post('buyer_contactoffice'),
					'buyer_contactphone'=>		$this->input->post('buyer_contactphone'),
					'buyer_email'=>				$this->input->post('buyer_email'),
			//ship to details
					'shipto_recipientname'=>	$recipientname,
					'shipto_companyname'=>		$companyname,
					'shipto_addressline1'=>		$addressline1,
					'shipto_addressline2'=>		$addressline2,
					'shipto_country'=>			$country,
					'shipto_state'=>			$state,
					'shipto_city'=>				$city,
					'shipto_zip'=>				$zip,
					'shipto_contactoffice'=>	$contactoffice,
					'shipto_contactphone'=>		$contactphone,
					'shipto_email'=>			$email,
				);

				
			$where						=		array('order_id'=>$this->input->post('order_id'));				
			$lastInsertid 				= 		$this->common->updateRecord('orders', $data, $where);
			$lastInsert 			 	= 		$this->common->deleteRecord('product_to_order', 'order_id', $this->input->post('order_id'));

			if (!empty($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price']) && is_array($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price'])) {  

				$item_sku 			= $_POST['item_sku'];
				$item_title 		= $_POST['item_title'];
				$item_quantity 		= $_POST['item_quantity'];
				$item_price 		= $_POST['item_price'];

				$total				=	0;
				$quantity			=	0;
				for ($i = 0; $i < count($item_title); $i++) {

					$where			=		array('merchant_SKU'=>$item_sku[$i]);
					$inventoryData	=		$this->common->getSingleRecord('inventory_data',$where);
					$total+= 				$item_quantity[$i]*$item_price[$i];
					$quantity+= 			$item_quantity[$i];
					$items	=	array(	
								'order_id'=>			$this->input->post('order_id'),
								'sku'=>					$item_sku[$i],
								'quantity'=>			$item_quantity[$i],
								'unitPrice'=>			$item_price[$i],
								'productId'=>			$inventoryData->inventory_id,		
								'item_name'=>			$item_title[$i], 
								'condition'=>			$inventoryData->condition,
								'item_image'=>			$inventoryData->item_image_url,
								'ean'=>					$inventoryData->EAN,
								'createDate'=>			date('Y-m-d H:i:s'),
								'Height'=>				$inventoryData->Height,
								'Length'=>				$inventoryData->Length,
								'Weight'=>				$inventoryData->Weight,
								'Width'=>				$inventoryData->Width,
								'upc'=>					$inventoryData->UPC			
							);	
					$lastid 		= 		$this->common->saveRecord('product_to_order', $items);	
				} 
			}
			if($lastInsertid>0){
				$data				=		array('order_total'=>$total,'quantity'=>$quantity,'sku'=>count($item_title));	
				$where				=		array('order_id'=>$this->input->post('order_id'));	
				$last 				= 		$this->common->updateRecord('orders', $data, $where);
				if($this->input->post('check_process')==1){
					
					$products =	$this->common->getRecord('product_to_order', $where);

					foreach($products as  $item) {
						$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
						$received  = $redata->total_received - $item->quantity;
						$resData	=	array('total_received' => $received);
						$ins_id = 	$this->common->updateRecord('warehouse_shipping_receiving', $resData, array('product_id' =>$item->productId));
					}
				}

				$save				=		array('save'=>true);
				header('Content-type: application/json');
				echo json_encode($save);
			}
		}else if($this->input->post('buyer_recipientname')){
			if($this->input->post('check_process')==1){
				$order_status	=	2;
				
				$w1				=		array('id'=>$this->input->post('buyer_country'));
				$buyer_country 	= 		$this->common->getSingleRecord('countries', $w1);
				
				$bcountry		=		$buyer_country->name;	

				$w2				=		array('id'=>$this->input->post('buyer_state'));
				$buyer_state 	= 		$this->common->getSingleRecord('states', $w2	);
				
				$bstate			=		$buyer_state->name;	

				$w3				=		array('id'=>$this->input->post('buyer_city'));
				$buyer_city 	=		$this->common->getSingleRecord('cities', $w3	);
				
				$bcity			=		$buyer_city->name;	

				
				
				
			}else{
				$order_status	=	1;
				$bcountry		=	$this->input->post('buyer_country');
				$bstate			=	$this->input->post('buyer_city');
				$bcity			=	$this->input->post('buyer_state');
				
				$shcountory		=	$this->input->post('shipto_country');
				$shstate		=	$this->input->post('shipto_state');
				$shcity			=	$this->input->post('shipto_city');
			}

			if($this->input->post('coupon_question')=="on"){
				$recipientname 	=  	$this->input->post('buyer_recipientname');
				$companyname	=	$this->input->post('buyer_companyname');
				$addressline1	=	$this->input->post('buyer_addressline1');
				$addressline2	=	$this->input->post('buyer_addressline2');
				$country		=	$bcountry;
				$state			=	$bstate;
				$city			=	$bcity;
				$zip			=	$this->input->post('buyer_zip');
				$contactoffice	=	$this->input->post('buyer_contactoffice');
				$contactphone	=	$this->input->post('buyer_contactphone');
				$email			=	$this->input->post('buyer_email');
			}else{
				if($this->input->post('check_process')==1){
					$wh1			=		array('id'=>$this->input->post('shipto_country'));
					$country 		= 		$this->common->getSingleRecord('countries', $wh1);
					
					$shcountory		=		$country->name;

					$wh2			=		array('id'=>$this->input->post('shipto_state'));
					$state 			= 		$this->common->getSingleRecord('states', $wh2);

					$shstate		=		$state->name;
					
					$wh3			=		array('id'=>$this->input->post('shipto_city'));
					$city 			=		$this->common->getSingleRecord('cities', $wh3);
					$shcity			=		$city->name;
				}else{
					$shcountory		=	$this->input->post('shipto_country');
					$shstate		=	$this->input->post('shipto_state');	
					$shcity			=	$this->input->post('shipto_city');
				}
				
				
				$recipientname 	=  	$this->input->post('shipto_recipientname');
				$companyname	=	$this->input->post('shipto_companyname');
				$addressline1	=	$this->input->post('shipto_addressline1');
				$addressline2	=	$this->input->post('shipto_addressline2');
				$country		=	$shcountory;
				$state			=	$shstate;
				$city			=	$shcity;
				$zip			=	$this->input->post('shipto_zip');
				$contactoffice	=	$this->input->post('shipto_contactoffice');
				$contactphone	=	$this->input->post('shipto_contactphone');
				$email			=	$this->input->post('shipto_email');
			}

			$data	= array(

			//Basic details
					'user_id'=>			$this->session->userdata('user_session')['id'],
					'order_number'=>	$this->input->post('order_number'),
					'order_date'=>		date('Y-m-d',strtotime($this->input->post('order_date'))),
					'order_status'=>	$order_status,
					'order_type'=>		3,
					'paid_date'=>		$this->input->post('paid_date'),
					'shipping_paid'=>	$this->input->post('shipping_paid'),
					'tax_paid'=>		$this->input->post('tax_paid'),
					'amount_paid'=>		$this->input->post('amount_paid'), 
					'customer_field_1'=>$this->input->post('customer_field_1'), 
					'customer_field_2'=>$this->input->post('customer_field_2'), 
					
					'buyer_note'=>		$this->input->post('buyer_note'), 
					'customer_note'=>	$this->input->post('customer_note'), 
					'gift_note'=>		$this->input->post('gift_note'), 
					'internet_note'=>	$this->input->post('internet_note'), 
					'order_shipby'=>	date('Y-m-d',strtotime($this->input->post('ship_by'))), 
					'hold_untill'=>		date('Y-m-d',strtotime($this->input->post('hold_untill'))),
			//Buyer details
					'customer_name'=>  			$this->input->post('buyer_recipientname'),
					'buyer_recipientname'=>  	$this->input->post('buyer_recipientname'),
					'buyer_companyname'=>		$this->input->post('buyer_companyname'),
					'buyer_addressline1'=>		$this->input->post('buyer_addressline1'),
					'buyer_addressline2'=>		$this->input->post('buyer_addressline2'),
					'buyer_country'=>			$bcountry,
					'buyer_state'=>				$bstate,
					'buyer_city'=>				$bcity,
					'buyer_zip'=>				$this->input->post('buyer_zip'),
					'buyer_contactoffice'=>		$this->input->post('buyer_contactoffice'),
					'buyer_contactphone'=>		$this->input->post('buyer_contactphone'),
					'buyer_email'=>				$this->input->post('buyer_email'),
			//ship to details
					'shipto_recipientname'=>	$recipientname,
					'shipto_companyname'=>		$companyname,
					'shipto_addressline1'=>		$addressline1,
					'shipto_addressline2'=>		$addressline2,
					'shipto_country'=>			$country,
					'shipto_state'=>			$state,
					'shipto_city'=>				$city,
					'shipto_zip'=>				$zip,
					'shipto_contactoffice'=>	$contactoffice,
					'shipto_contactphone'=>		$contactphone,
					'shipto_email'=>			$email,
				);			

			$lastInsertid 		= 		$this->common->saveRecord('orders', $data);
			if($lastInsertid){
				$datas				=		array(
												'order_number'=>'HUB-ORDR-100100'.$lastInsertid,
												'order_name'=>'HUB-local-ORDR-'.$lastInsertid
											);
				$where_order		=		array('order_id'=>$lastInsertid);
				$update 			= 		$this->common->updateRecord('orders', $datas, $where_order);
			}

			if (!empty($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price']) && is_array($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price'])) {

				$item_sku 			= $_POST['item_sku'];
				$item_title 		= $_POST['item_title'];
				$item_quantity 		= $_POST['item_quantity'];
				$item_price 		= $_POST['item_price'];
				$total				=	0;
				$quantity			=	0;
				for ($i = 0; $i < count($item_title); $i++) {

					$where			=		array('merchant_SKU'=>$item_sku[$i]);
					$inventoryData	=		$this->common->getSingleRecord('inventory_data',$where);
					$total+= 				$item_quantity[$i]*$item_price[$i];
					$quantity+= 			$item_quantity[$i];
					$items	=	array(	
								'order_id'=>			$lastInsertid,
								'sku'=>					$item_sku[$i],
								'quantity'=>			$item_quantity[$i],
								'unitPrice'=>			$item_price[$i],
								'productId'=>			$inventoryData->inventory_id,		
								'item_name'=>			$item_title[$i], 
								'condition'=>			$inventoryData->condition,
								'item_image'=>			$inventoryData->item_image_url,
								'ean'=>					$inventoryData->EAN,
								'createDate'=>			date('Y-m-d H:i:s'),
								'Height'=>				$inventoryData->Height,
								'Length'=>				$inventoryData->Length,
								'Weight'=>				$inventoryData->Weight,
								'Width'=>				$inventoryData->Width,
								'upc'=>					$inventoryData->UPC			
							);	
					$lastid 		= 		$this->common->saveRecord('product_to_order', $items);	
				} 
			}
			if($lastInsertid){
				$data				=		array('order_total'=>$total,'quantity'=>$quantity,'sku'=>count($item_title));	
				$where				=		array('order_id'=>$lastInsertid);	
				$last 				= 		$this->common->updateRecord('orders', $data, $where);
				
				if($this->input->post('check_process')==1){
					
					$products =	$this->common->getRecord('product_to_order', $where);
					foreach($products as  $item) {
						$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
						$received  = $redata->total_received - $item->quantity;
						$resData	=	array('total_received' => $received);
						$ins_id = 	$this->common->updateRecord('warehouse_shipping_receiving', $resData, array('product_id' =>$item->productId));
					}
				}

				$save				=		array('save'=>true);
				header('Content-type: application/json');
				echo json_encode($save);
			}
		}else{
			$save				=		array('error'=>'error');
			header('Content-type: application/json');
			echo json_encode($save);
		}
	}

	public function vieworderDetails($customer_id){
		$orders 						= 		$this->common->getRecordWithJoinOrder($customer_id);  
		$data['orders']					=		$orders;
		$this->layout->title('View Order | Hubway');
		$this->layout->view('viewordersDetails',$data);
	}

	public function edit_order($order_id){
		$where				=		array('order_id'=>$order_id);
		$order 				= 		$this->common->getSingleRecord('orders',$where);
		$data['products']	= 		$this->common->getRecord('product_to_order',$where);
		$data['allcountry']	= 		$this->common->getRecord('countries');
		
	
		$whereid     		 =  @array('id'=>$order->buyer_state);
		$state        		=   $this->common->getSingleRecord('states', $whereid);
  
		//Get city information
		$whereid      				=  	array('id'=>$order->buyer_city);
		$city       				=   $this->common->getSingleRecord('cities', $whereid);
		
		$whereid      				=  array('id'=>$order->shipto_state);
		$ship_state        			=   $this->common->getSingleRecord('states', $whereid);
  
		//Get city information
		$whereid      			=  	array('id'=>$order->shipto_city);
		$ship_city      		=   $this->common->getSingleRecord('cities', $whereid);
   
		$data['state']      	=   $state;
		$data['city']     		=   $city;
		
		$data['ship_state']     =   $ship_state;
		$data['ship_city']     	=   $ship_city;
		$data['order']     		=   $order;

		$this->layout->title('View Order | Hubway');
		$this->layout->view('edit_order',$data);
	}

	public function deleteRecordOrder() { 
		$table 		= $this->input->post('table');
		$column 	= $this->input->post('column');
		$value 		= $this->input->post('value');
		$response 	= $this->common->deleteRecord($table, $column, $value);
	}

	public function download($order_id, $type){
		if($order_id!='' && $type!=''){ 
			$this->load->library('zip');
			$where				=		array('order_id'=>$order_id);
			$order 				= 		$this->common->getSingleRecord('orders',$where);
			$type				=		$type;
			if($type==1){
				$createdzipname = 'label';
				$files 			= 		 explode(",", $order->label_images);
				$filepath		=		"uploads/label";
			}else if($type==2){
				$createdzipname = 'carton';
				$files				= 		explode(",", $order->carton_images); 
				$filepath			=		"uploads/carton";
			}else{
				$createdzipname = 'shipping_label';
				$files 				= 		explode(",", $order->shipping_label_images);
				$filepath			=		"uploads/shipping_label";				
			}

			$this->load->library('zip');
			$this->load->helper('download');
			foreach ($files as $file) {
				$paths = $filepath."/".$file;
				$this->zip->read_file($paths);
			}
			$this->zip->download($createdzipname.'.zip');
		}
	}
	
	public function checkSku(){
		if(($this->input->post('sku')!=null) && ($this->input->post('getSku'))){
			$where					=		array('merchant_SKU'=>$this->input->post('sku'));
			$items 					= 		$this->common->getSingleRecord('inventory_data',$where);
			if(empty($items)){
				$msg				=	array('error'=>'error');
				header('Content-type: application/json');
				echo json_encode($msg);
			}else{
				header('Content-type: application/json');
				echo json_encode($items);
			}
		}
	}


	public function getItemCharges() {
		if($this->input->post('item_sku') != null && $this->input->post('quantity') != null) {
			$where = array('merchant_SKU' => $this->input->post('item_sku'));
			$items = $this->common->getRecord('inventory_data', $where);

			if(!empty($items)) {
				$item_weight_unit = $items[0]->weight_unit;
				$item_weight = $items[0]->Weight;

				if($item_weight_unit == 'hundredths-pounds') {
					$final_item_weight = round($item_weight / 100);
				}

				//echo $final_item_weight;

				if($final_item_weight > 0)
					$getItemFulfillCharge = $this->common->getRecord('seller_fulfill', array('from_product_weight >=' => $final_item_weight, 'to_product_weight <=' => $final_item_weight));
				else
					$getItemFulfillCharge = $this->common->getRecord('seller_fulfill', array('from_product_weight >=' => $final_item_weight, 'to_product_weight <=' => 1));

				if(!empty($getItemFulfillCharge)) {
					$fulfill_processing_fee = $getItemFulfillCharge[0]->processing_fee;

					$item_charges = $this->input->post('quantity') * $fulfill_processing_fee;

					echo $fulfill_processing_fee.'&&&&'.$item_charges;
				}
			}
		}
	}

	function create_disposalOrder(){ 
		if($this->input->post('create_order') && $this->input->post('dispose_by')){
			$date 	= 		date('Y-m-d H:i:s');
			$data			=array(
								'customer_name'			=>'',	//$address->name,''
								'order_name'			=>	$this->input->post('order_name'),
								'user_id'				=>	$this->session->userdata("user_session")["id"] ,
								'createdate'			=>	$date, 
								'dispose_by'			=>	date('Y-m-d',strtotime($this->input->post('dispose_by'))),
								'order_status'			=>1,
								'order_type'			=>4,
								'step'					=>1
							);

			$lastInsertid 	= 		$this->common->saveRecord('orders', $data);
			if($lastInsertid>0){
				$where		=		array('order_id'=>$lastInsertid);	
				$data		=		array('order_number'=>'HUB-ORDR-100100'.$lastInsertid);
				$update 	= 		$this->common->updateRecord('orders', $data, $where);
				$orders 	= 		$this->common->getSingleRecord('orders',  $where);
				header('Content-type: application/json');
				echo json_encode($orders);
			}
			
		}
	}

	function update_disposalOrder(){
		
		if($this->input->post('addProduct') && $this->input->post('order_id')){
			$where								=		array('inventory_data.inventory_id'=>$this->input->post('product_id'));
			$inventory 						= 		$this->common->getRecordWithJoinReceivedItem($where);
			if(!empty($inventory)){
				$inventoryData	=	$inventory[0];
				$itemHeight		=	$inventoryData->Height;
				$itemLength		=	$inventoryData->Length;
				$itemWidth		=	$inventoryData->Width;
	
				$totaldim		=	$itemHeight*$itemLength*$itemWidth;
			
				$product						=		array(
														//'customer_id'=>$this->session->userdata("user_session")["id"],
														'productId'=>$inventoryData->inventory_id,												
														'sku'=>$inventoryData->merchant_SKU ,
														'item_name'=>$inventoryData->title , 
														'order_id'=>$this->input->post('order_id'),
														'condition'=>$inventoryData->condition,
														//'cost'=>$inventoryData->cost,
														'unitPrice'=>$inventoryData->price,
														'in_stock'=>$inventoryData->total_received,
														'item_image'=>$inventoryData->item_image_url,
														'ean'=>$inventoryData->EAN,
														//'quantity'=>$inventoryData->quantity,
														'createDate'=>date('Y-m-d H:i:s'),
														'Height'=>$inventoryData->Height,
														'Length'=>$inventoryData->Length,
														'Weight'=>$inventoryData->Weight,
														'Width'=>$inventoryData->Width,
														'item_dimension'=>$totaldim,
														'upc'=>$inventoryData->UPC
													);
				$lastInsid 						= 		$this->common->saveRecord('product_to_order', $product);
			}
		}

		if($this->input->post('updateExistingOrder') && $this->input->post('order_id')){
			$where		=		array('order_id'=>$this->input->post('order_id'));
			$data		=		array(
										'order_name'=>$this->input->post('order_name'),
										'dispose_by'=>date('Y-m-d',strtotime($this->input->post('dispose_by')))
									);
			$order 		= 		$this->common->updateRecord('orders', $data, $where);
			if($order){
				$msg		=		array('Save exist order data'=>true); 
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}
		
		
		if($this->input->post('deleteProduct') && $this->input->post('product_id')){	
			$order_id					=		$this->input->post('order_id');
			$response 					= 		$this->common->deleteRecord('product_to_order', 'item_id', $this->input->post('product_id'));
			if($response>0){
				$where							=		array('order_id'=>$order_id); 
				$products 						= 		$this->common->getRecord('product_to_order',$where);
				header('Content-type: application/json');
				echo json_encode($products);
			}else{
				$error					=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($error);
			}
		}

		if($this->input->post('updateQuantity') && $this->input->post('item_id')){	
			$where		=		array('item_id'=>$this->input->post('item_id'));
			$data		=		array('quantity'=>$this->input->post('quantity'));
			$update 	= 		$this->common->updateRecord('product_to_order', $data, $where);
			if($update>0){
				$where		=		array('order_id'=>$this->input->post('order_id'));
				$unit		=		$this->common->getSumOfItem('product_to_order', 'quantity', $where);
				
				$data		=		array('unit'=>$unit->total);
				$order 		= 		$this->common->updateRecord('orders', $data, $where);
				$msg		=		array('save'=>$update); 
				header('Content-type: application/json');
				echo json_encode($msg);
			}else{
				$msg			=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}	
		
		if($this->input->post('updateimageProof') && $this->input->post('item_id')){	
			$where		=		array('item_id'=>$this->input->post('item_id'));
			$data		=		array('image_proff_needed'=>$this->input->post('image_proff_needed'));
			$update 	= 		$this->common->updateRecord('product_to_order', $data, $where);
			if($update>0){
				$where		=		array('order_id'=>$this->input->post('order_id'));
				$total		=		$this->common->getSumOfItem('product_to_order', 'image_proff_needed', $where);
				$data		=		array('order_total'=>$total->total);
				$order 		= 		$this->common->updateRecord('orders', $data, $where);
				$msg		=		array('Updated'=>true); 
				header('Content-type: application/json');
				echo json_encode($msg);
			}else{
				$msg			=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}	
		if($this->input->post('deleteItem') && $this->input->post('item_id') && ($this->input->post('order_id')!=null)){

			$order_id 	= $this->input->post('order_id');
			$table 		= 'product_to_order';
			$column 	= 'item_id';
			$value 		= $this->input->post('item_id');
			$response 	= $this->common->deleteRecord($table, $column, $value);

			$where		= array('order_id'=>$order_id );
			$unit		= $this->common->getSumOfItem('product_to_order', 'quantity', $where);

			$data		=		array('unit'=>$unit->total);
			$order 		= 		$this->common->updateRecord('orders', $data, $where);
			if($order>0){
				$msg		=		array('Updated'=>true); 
				header('Content-type: application/json');
				echo json_encode($msg);
			}else{
				$msg			=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}

		if($this->input->post('saveOrder') && $this->input->post('order_id')){	
			$where		=		array('order_id'=>$this->input->post('order_id'));
			$data		=		array(
									'order_status'=>$this->input->post('order_status'),
									'dispose_by'=>$this->input->post('dispose_by'),
									'order_name'=>$this->input->post('order_name')
								);
			$update 	= 		$this->common->updateRecord('orders', $data, $where);
			if($update>0){
				$items=		$this->common->getRecord('product_to_order', $where);
				foreach($items as  $item) {
					$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
					$received  = $redata->total_received - $item->quantity;
					$resData	=	array('total_received' => $received);
					$ins_id = 	$this->common->updateRecord('warehouse_shipping_receiving', $resData, array('product_id' =>$item->productId));
				}

				$msg		=		array('save'=>true); 
				header('Content-type: application/json');
				echo json_encode($msg);
			}else{
				$msg			=		array('error'=>'error found');
				header('Content-type: application/json');
				echo json_encode($msg);
			}
		}	
	}

	function getDisposalorder(){
		$user_id		=		$this->session->userdata("user_session")["id"];	
		$array					=		array('user_id'=>$user_id, 'order_type'=>4, 'order_status'=>1);
		$data['exist_orders']	=		$this->common->getRecordWithJoinuserOrder($array);
		$this->load->view('ajax/disposal_order', $data);
	}
	function disposalorderView($order_id){
		$where		= array('order_id'=>$order_id );
		$data['order']			=		$this->common->getSingleRecord('orders', $where);
		$data['products']		=		$this->common->getRecord('product_to_order', $where);
		$this->layout->title('Disposal Order Details | Hubway');
		$this->layout->view('disposal_view',$data);
	}
	
	
	function add_to_an_existing_disposalOrder(){
		if($this->input->post('exist_order_id') && $this->input->post('add_exist_exist_order')){
			$exist_order_id		=		$this->input->post('exist_order_id');
			$where		=		array('order_id'=>$exist_order_id);
			$items=		$this->common->getRecord('product_to_order', $where);
			foreach($items as  $item) {
				$redata		=	$this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' =>$item->productId));
				//$quantity  = $redata->total_received - $item->quantity;
				if($item->quantity >  $redata->total_received){
					$quantity		=	$redata->total_received;
					$resData	=	array('quantity' => $quantity);
					$ins_id = 	$this->common->updateRecord('product_to_order', $resData, array('productId' =>$item->productId));
				}
			}
			$data['items']		=		$this->common->getRecord('product_to_order',$where);
			$this->load->view('steps/disposal/disposal_step1_table', $data);
		}else{
			$error				=		array('error'=>'error found');
			header('Content-type: application/json');
			echo json_encode($error);
		}
	}

	function getDisposalorderStep($step, $order_id=null){
		
		if($order_id!=null){
			$where		=		array('order_id'=>$order_id);
			$data		=		array('step'=>$step);
			$update 	= 		$this->common->updateRecord('orders', $data, $where);
		}

		if(($step!=null) && ($step==2)){
			$where			=		array('order_id'=>$order_id);
			$data['order']	=		$this->common->getSingleRecord('orders',$where);
			$data['existorderProduct']	=		$this->common->getRecord('product_to_order',$where);
			$whereis		=		array('warehouse_shipping_receiving.total_received >'=>0);
			$data['inventoryData']	= 		$this->common->getRecordWithJoinReceivedItem($whereis);
			$this->load->view('steps/disposal/disposal_step2_table', $data);
		}

		if(($step!=null) && ($step==3)){
			$where			=		array('order_id'=>$order_id);
			$data['order']	=		$this->common->getSingleRecord('orders',$where);
			$data['items']	=		$this->common->getRecord('product_to_order',$where);
			$this->load->view('steps/disposal/disposal_step3_table', $data);
		}

		if(($step!=null) && ($step==4)){
			$where			=		array('order_id'=>$order_id);
			$data['order']	=		$this->common->getSingleRecord('orders',$where);
			$data['items']	=		$this->common->getRecord('product_to_order',$where);
			$this->load->view('steps/disposal/disposal_step4_table', $data);
		}
	}
	

}	