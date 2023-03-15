<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Createorder extends MY_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function index(){
		$country 						= 		$this->common->getRecord('countries');
		$data['country']  				= 		$country;
		$data['random']  				= 		'HUB-'.(rand(10,10000)).'-ORDR';
		$this->layout->title('Create Order | Hubway');
		$this->layout->view('createorders',$data);
	}
	
	public function input_roll()
	{
		$this->load->view('input_roll');
	}
	
	public function edit_order($order_number=''){
		$wherearray						=		array('order_number'=>$order_number);
		$customer						= 		$this->common->getSingleRecord('customer',$wherearray);  
		$data['orders']					= 		$this->common->getRecord('orders',$wherearray);
		$country 						= 		$this->common->getRecord('countries');
		$data['customer']				=		$customer;
		//Get State information
		$whereid						=		@array('id'=>$customer->state);
		$state							= 		$this->common->getSingleRecord('states', $whereid);
		$data['state'] 					=		$state->name;
		//Get city information
		$whereid						=		@array('id'=>$customer->city);
		$city							= 		$this->common->getSingleRecord('cities', $whereid);
		$data['city']					=		$city->name;
		$data['country']  				= 		$country;		
		$this->layout->title('View Order | Hubway');
		$this->layout->view('edit_order',$data);
	}

	public function vieworder(){
		$where							=		array('order_type'=>1);
		$orders 						= 		$this->common->getRecord('orders',$where);  
		$data['orders']					=		$orders;
		$where							=		array('order_type'=>2);
		$manual_orders 					= 		$this->common->getRecord('orders',$where); 
		$data['manual_orders']			=		$manual_orders;	
		$this->layout->title('View Order | Hubway');
		$this->layout->view('vieworder',$data);
	}
	
	public function vieworderDetails($order_number=null){
		$where							=		array('order_number'=>$order_number);
		$customer 						= 		$this->common->getSingleRecord('customer', $where);
		$wherearray						=		array('order_number'=>$customer->order_number);
		$data['orders']					= 		$this->common->getRecord('orders',$wherearray);
		$data['coustomer']				=		$customer; 	
		$this->layout->title('View Order | Hubway');
		$this->layout->view('viewordersDetails',$data);
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
	
	public function createOrder(){ 
		if($this->input->post('recipient_name')){  

			$data	=	array(
						'user_id'			=>$this->session->userdata('user_session')['id'],
						'customer_name'		=>$this->input->post('recipient_name'), 
						'company_name'		=>$this->input->post('company_name'), 
						'address_line_1'	=>$this->input->post('address_line_1'), 
						'address_line_2'	=>$this->input->post('address_line_2'), 
						'amount_paid'		=>$this->input->post('amount_paid'), 
						'city'				=>$this->input->post('city'), 
						
						'contact_mobile'	=>$this->input->post('contact_mobile'), 
						'contact_office'	=>$this->input->post('contact_office'), 
						'country'			=>$this->input->post('country'), 
						'email'				=>$this->input->post('email'), 
						'order_number'		=>$this->input->post('order_number'), 
						'order_status'		=>2,
						
						'ship_by'			=>date('Y-m-d', strtotime($this->input->post('ship_by'))),
						'order_date'		=>date('Y-m-d', strtotime($this->input->post('order_date'))), 
						'paid_date'			=>date('Y-m-d', strtotime($this->input->post('paid_date'))),
						'state'				=>$this->input->post('state'), 
						'zipcode'			=>$this->input->post('zipcode'), 
						'tax_paid'			=>$this->input->post('tax_paid'),
						'hold_untill'		=>date('Y-m-d', strtotime($this->input->post('hold_untill'))),
						'shipping_paid'		=>$this->input->post('shipping_paid'), 
						
						
						'customer_note'		=>$this->input->post('customer_note'), 
						'buyer_note'		=>$this->input->post('buyer_note'), 
						'internet_note'		=>$this->input->post('internet_note'), 
						'gift_note'			=>$this->input->post('gift_note'), 
						'customer_field_1'	=>$this->input->post('customer_field_1'), 
						'customer_field_2'	=>$this->input->post('customer_field_2'), 
						
						

								'ship_to_recipient_name'	=>$this->input->post('ship_to_recipient_name'),
								'ship_to_company_name'		=>$this->input->post('ship_to_company_name'),
								'ship_to_address_line_1'	=>$this->input->post('ship_to_address_line_1'),
								'ship_to_country'			=>$this->input->post('ship_to_country'),
								'ship_to_state'				=>$this->input->post('ship_to_state'),
								'ship_to_city'				=>$this->input->post('ship_to_city'),
								'ship_to_zipcode'			=>$this->input->post('ship_to_zipcode'),
								'ship_to_contact_office'	=>$this->input->post('ship_to_contact_office'),
								'ship_to_email'				=>$this->input->post('ship_to_email')
						
						);			
												
			$lastInsertid 		= 		$this->common->saveRecord('customer', $data);

			if (!empty($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price']) && is_array($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price'])) {
				$item_sku 			= $_POST['item_sku'];
				$item_title 		= $_POST['item_title'];
				$item_quantity 		= $_POST['item_quantity'];
				$item_price 		= $_POST['item_price'];

				$sumtotal=0;
				for ($i = 0; $i < count($item_title); $i++) {
					
					
					$whereid						=		@array('merchant_SKU'=>$item_sku[$i]);
					$inventory_data					= 		$this->common->getSingleRecord('inventory_data', $whereid);
					
					if(!empty($inventory_data)){
						$item_image					=		$inventory_data->item_image_url;	
					}else{
						$item_image					=		'http://www.vishmax.com/en/innovattive-cms/themes/themax-theme-2015/images/no-image-found.gif';
					}
					$sum			= 			$item_quantity[$i]*$item_price[$i];
					$sumtotal+= 	$sum;
					$items			=		array(	
												'order_number'		=>$this->input->post('order_number'),
												'customer_name'		=>$this->input->post('recipient_name'), 
												'customer_id'		=>$lastInsertid,
												'sku'				=>$item_sku[$i],
												'item_name'			=>$item_title[$i], 
												'item_image'		=>addslashes($item_image),
												'quantity'			=>$item_quantity[$i],
												'order_type'		=>2,
												'order_total'		=>$sum,
												'item_price'		=>$item_price[$i]
					);	
					$lastid 			= 		$this->common->saveRecord('orders', $items);	
					
				}
					$unit				=		array('total_order_amount'=>$sumtotal);
					$wheredata			=		array('order_number'=>$this->input->post('order_number'),'customer_id'=>$lastInsertid);
					$lastInsertid 		= 		$this->common->updateRecord('customer', $unit, $wheredata);				
			}
			
			$save				=		array('save'=>true);
			header('Content-type: application/json');
			echo json_encode($save);
		}else{
			$save				=		array('error'=>'error');
			header('Content-type: application/json');
			echo json_encode($save);
		}
	}
	public function updateOrder(){ 
		if($this->input->post('recipient_name')){  
			$data	=	array(
							'user_id'=>$this->session->userdata('user_session')['id'],

							'customer_name'		=>$this->input->post('recipient_name'), 
							'company_name'		=>$this->input->post('company_name'), 
							'address_line_1'	=>$this->input->post('address_line_1'), 
							'address_line_2'	=>$this->input->post('address_line_2'), 
							'state'				=>$this->input->post('state'), 
							'zipcode'			=>$this->input->post('zipcode'), 
							'city'				=>$this->input->post('city'), 

							'contact_mobile'	=>$this->input->post('contact_mobile'), 
							'contact_office'	=>$this->input->post('contact_office'), 
							'country'			=>$this->input->post('country'), 
							'email'				=>$this->input->post('email'), 
							'order_number'		=>$this->input->post('order_number'),
							'ship_by'			=>date('Y-m-d', strtotime($this->input->post('ship_by'))),													
							'order_date'		=>date('Y-m-d', strtotime($this->input->post('order_date'))), 
							'paid_date'			=>date('Y-m-d', strtotime($this->input->post('paid_date'))),
							'amount_paid'		=>$this->input->post('amount_paid'), 
							'tax_paid'			=>$this->input->post('tax_paid'),
							'hold_untill'		=>date('Y-m-d', strtotime($this->input->post('hold_untill'))),
							'shipping_paid'		=>$this->input->post('shipping_paid'), 

							'customer_note'		=>$this->input->post('customer_note'), 
							'buyer_note'		=>$this->input->post('buyer_note'), 
							'internet_note'		=>$this->input->post('internet_note'), 
							'gift_note'			=>$this->input->post('gift_note'), 
							'customer_field_1'	=>$this->input->post('customer_field_1'), 
							'customer_field_2'	=>$this->input->post('customer_field_2'), 

							
								'ship_to_recipient_name'	=>$this->input->post('ship_to_recipient_name'),
								'ship_to_company_name'		=>$this->input->post('ship_to_company_name'),
								'ship_to_address_line_1'	=>$this->input->post('ship_to_address_line_1'),
								'ship_to_country'			=>$this->input->post('ship_to_country'),
								'ship_to_state'				=>$this->input->post('ship_to_state'),
								'ship_to_city'				=>$this->input->post('ship_to_city'),
								'ship_to_zipcode'			=>$this->input->post('ship_to_zipcode'),
								'ship_to_contact_office'	=>$this->input->post('ship_to_contact_office'),
								'ship_to_email'				=>$this->input->post('ship_to_email')
							
						);				

			$lastInsertid 		= 		$this->common->updateRecord('customer', $data, $where=array('customer_id',$this->input->post('customer_id')));


			if (!empty($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price']) && is_array($_POST['item_sku']) && !empty($_POST['item_title']) && !empty($_POST['item_quantity']) && !empty($_POST['item_price'])) {
				$item_sku 			= $_POST['item_sku'];
				$item_title 		= $_POST['item_title'];
				$item_quantity 		= $_POST['item_quantity'];
				$item_price 		= $_POST['item_price'];
				$this->common->deleteRecord('orders', 'order_number',$this->input->post('order_number'));
				
				$sumtotal	=	0;
				for ($i = 0; $i < count($item_title); $i++) {

					$whereid						=		@array('merchant_SKU'=>$item_sku[$i]);
					$inventory_data					= 		$this->common->getSingleRecord('inventory_data', $whereid);
					
					if(!empty($inventory_data)){
						$item_image					=		$inventory_data->item_image_url;	
					}else{
						$item_image					=		'http://www.vishmax.com/en/innovattive-cms/themes/themax-theme-2015/images/no-image-found.gif';
					}
					$sum			= 			$item_quantity[$i]*$item_price[$i];
					$sumtotal+= 	$sum;

					$items			=		array(	
												'order_number'		=>$this->input->post('order_number'),
												'customer_name'		=>$this->input->post('recipient_name'), 
												'customer_id'		=>$this->input->post('customer_id'),
												'item_image'		=>addslashes($item_image),
												'sku'				=>$item_sku[$i],
												'item_name'			=>$item_title[$i], 
												'quantity'			=>$item_quantity[$i],
												'order_type'		=>2,
												'order_total'		=>$sum,
												'item_price'		=>$item_price[$i]
					);	
					$lastid 			= 		$this->common->saveRecord('orders', $items);				
				} 
					$unit				=		array('total_order_amount'=>$sumtotal);
					$wheredata			=		array('order_number'=>$this->input->post('order_number'));
					$lastInsertid 		= 		$this->common->updateRecord('customer', $unit, $wheredata);	
			}

			$save				=		array('save'=>true);
			header('Content-type: application/json');
			echo json_encode($save);
		}else{
			$save				=		array('error'=>'error');
			header('Content-type: application/json');
			echo json_encode($save);
		}
	}
}	