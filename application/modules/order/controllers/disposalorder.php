<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Disposalorder extends MY_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function index(){
		$data['inventoryData']			= 		$this->common->getRecord('inventory_data');
		$this->layout->title('Create Order | Hubway');
		$this->layout->view('create_disposal_order',$data);
	}
	
	public function create_dispodeOrder(){
		if($this->input->post('create_order')   &&  ($this->input->post('dispose_by'))){
			$date 	= 		date('Y-m-d H:i:s');
			$data	=		array(
							'dispose_by'			=>date('Y-m-d',strtotime($this->input->post('order_shipby'))),
							'order_name'			=>$this->input->post('order_name'),
							'order_status'			=>1,
							'order_type'			=>4,
							'user_id'				=>$this->session->userdata("user_session")["id"],
							'step'					=>1
							);
			$lastInsertid 					= 		$this->common->saveRecord('orders', $data);
			if($lastInsertid>0){
				$order_session 			= 		array(
													'order_id' => 	$lastInsertid,
													'order_number' =>'HUB-ORDR-100100'.$lastInsertid,
													'logged_in' => TRUE
												);
				$this->session->set_userdata('dispose_order_session', $order_session);
				$where_order					=		array('order_id'=>$lastInsertid);
				$datas							=		array('order_number'=>'HUB-ORDR-100100'.$lastInsertid);
				$update 						= 		$this->common->updateRecord('orders', $datas, $where_order);
				$order 							= 		$this->common->getSingleRecord('orders', $where_order);
				header('Content-type: application/json');
				echo json_encode($order);
			}
		}
	}

	public function updateOrder(){
		
		if($this->input->post('addProduct')){
			$where				=		array('inventory_id'=>$this->input->post('product_id'));
			$inventoryData 		= 		$this->common->getSingleRecord('inventory_data',$where);
			if(!empty($inventoryData)){
				$itemHeight		=	$inventoryData->Height;
				$itemLength		=	$inventoryData->Length;
				$itemWidth		=	$inventoryData->Width;
				
				$totaldim		=	$itemHeight*$itemLength*$itemWidth;				
	
				$product		=		array(
						//'customer_id'=>$this->session->userdata("user_session")["id"],
						'productId'=>$inventoryData->inventory_id,												
						'sku'=>$inventoryData->merchant_SKU ,
						'item_name'=>$inventoryData->title , 
						'order_id'=>$this->session->userdata("dispose_order_session")["order_id"],
						'condition'=>$inventoryData->condition,
						//'cost'=>$inventoryData->cost,
						'unitPrice'=>$inventoryData->price,
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
						//'unit_volume'=>$inventoryData->unit_volume,
					);
				$lastInsid 	= 		$this->common->saveRecord('product_to_order', $product);
				echo  $lastInsid;
			}
		}
	}
	
}	