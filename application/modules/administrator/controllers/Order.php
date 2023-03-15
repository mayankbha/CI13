<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends Admin_Controller { 
	public $data = null;

	public function __construct() {  
		parent::__construct();

		if(!$this->session->userdata('admin_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}

	public function index(){
		$array = array(
			'user_id !=' => 0
		);
		$data['all_orders']		=		$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'order_type'=>2,
		);
		
		$data['fba_orders']		=		$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'order_type'=>3
		);
		$data['local_orders']		=		$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$array = array(
			'order_type'=>4
		);
		$data['disposal_orders']		=	$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');
		
		$array = array(
			'order_type'=>1
		);
		$data['shipstation_orders']	=		$this->common->getRecordOrderby('orders', $array, 'order_id', 'desc');

		$this->layout->title('View Order | Hubway');
		$this->layout->view('orders/vieworders',$data);
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
		$this->layout->view('orders/view_order_details',$data);
	}
	public function updateOrder(){
		if($this->input->post('mark_us_shipped_order') && $this->input->post('order_id')){
		
			$where							=		array('order_id'=>$this->input->post('order_id'));
			$data							=		array('order_status' => 4);
			$lastInsertid 					= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Order' =>'Shipped');
				header('Content-type: application/json');
				echo json_encode($message);
			}else{
				$message					=		array('error' =>'Error found in mark as shipped.');
				header('Content-type: application/json');
				echo json_encode($message);
			}

			$order_status = 4;
		}
		
		if($this->input->post('mark_us_disposed_order') && $this->input->post('order_id')){
		
			$where							=		array('order_id'=>$this->input->post('order_id'));
			$data							=		array('order_status' => 3);
			$lastInsertid 					= 		$this->common->updateRecord('orders', $data, $where);

			if($lastInsertid>0){
				$message					=		array('Order' =>'Disposed');
				header('Content-type: application/json');
				echo json_encode($message);
			}else{
				$message					=		array('error' =>'Error found in mark as disposed.');
				header('Content-type: application/json');
				echo json_encode($message);
			}

			$order_status = 3;
		}

		$getOrderDetails = $this->common->getRecord('orders', array('order_id' => $this->input->post('order_id')));

		$order_type = $getOrderDetails[0]->order_type;
		$order_total = $getOrderDetails[0]->order_total;
		$order_total_outbound = $getOrderDetails[0]->totaloutbound;
		$order_status = $getOrderDetails[0]->order_status;

		$total_cubic_feet = $getOrderDetails[0]->totalqubicft;

		$unit = $getOrderDetails[0]->unit;

		$no_of_pallets = $getOrderDetails[0]->no_of_pallets;

		$user_id = $getOrderDetails[0]->user_id;

		$getCharges = $this->common->getRecord('charges');

		if($order_type == 2) {
			//FBA
			$outbound_fee_charge = $getCharges[0]->outbound_fee;
			$packaging_fee_charge = $getCharges[0]->packaging_fee;
			$per_pallet_fee_charge = $getCharges[0]->per_pallet_fee;

			$packaging_fee = $unit * $packaging_fee_charge;
			$pallet_fee = $no_of_pallets * $per_pallet_fee_charge;

			$order_cost = $order_total;
			$outbound_fee = $order_total_outbound;
		} else if($order_type == 3) {
			//Local Fulfill
			$order_cost = $order_total;
			$outbound_fee = $order_total_outbound;

			$processing_fee = $outbound_fee;
		}

		$transactions_data = array(
								'user_id' => $getShipmentDetail[0]->user_id,
								'order_id' => $this->input->post('order_id'),
								'unit' => $unit,
								'total_cubic_feet' => $total_cubic_feet,
								'order_cost' => $order_cost,
								'order_type' => $outbound_fee,
								'order_status' => $order_status,
								'packaging_fee' => $packaging_fee,
								'pallet_fee' => $pallet_fee,
								'processing_fee' => $processing_fee,
								'transaction_date' => date('Y-m-d')
							);

		$this->common->saveRecord('transactions', $transactions_data);
	}
	
	public function uploadImageProof() {
		$data = array();

        if(@$_FILES['image_proof']) {
			//echo $_FILES['image_proof']['name'];

			$filesCount = count($_FILES['image_proof']['name']);

			//echo $filesCount;

            for($i = 0; $i < $filesCount; $i++) {
				$_FILES['userFile']['name'] = $_FILES['image_proof']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['image_proof']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['image_proof']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['image_proof']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['image_proof']['size'][$i];

				$uploadPath = 'uploads/image_proof';

				//echo $uploadPath;

				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('userFile')) {
					$fileData = $this->upload->data();
					$uploadData[] = $fileData['file_name'];
				} else {
					//var_dump($this->upload->display_errors());
				}
			}
 
			//echo "<pre>"; print_r($uploadData);

            if(!empty($uploadData)) {
                /*$where			=		array('order_id'=>$this->session->userdata("order_session")["order_id"]);
				$orders			=		$this->common->getSingleRecord('orders',$where);
				
				if(!empty($orders->carton_images)){
					$carton_image			=		implode(",",$uploadData);
					$all_carton_images		=  $orders->carton_images .','.$carton_image;
				}else{
					$carton_image	=		implode(",",$uploadData);
					$all_carton_images		=  $carton_image;
				}*/

				$image_proof = implode(",", $uploadData);
				$all_image_proof = $image_proof;

                $insert = $this->common->updateRecord('product_to_order', array('image_proof' => $all_image_proof), array('item_id' => $this->input->post('item_id')));

				if($insert) {
					$message					=		array('File' =>'Uploded', 'Name' => $all_image_proof);
					header('Content-type: application/json');
					echo json_encode($message);
				} else {
					$message					=		array('File' =>'Not Uploded');
					header('Content-type: application/json');
					echo json_encode($message);
				}
            }
        }
	}
	
	public function updatepallets(){ 
		if($this->input->post('order_id') && $this->input->post('updatePallet')){  
			$order_id	=	$this->input->post('order_id');
			
			$res		=	$this->common->getSingleRecord('orders', array('order_id' =>$order_id));
			$pallet_cost					=	$this->input->post('no_of_pallets')*8;
			$order_total					=	$res->order_total+$pallet_cost;
			$data							=	array('no_of_pallets' =>$this->input->post('no_of_pallets'), 'order_total'=>$order_total);
			$where							=		array('order_id' => $order_id);
			$lastInsertid 					= 		$this->common->updateRecord('orders', $data, $where);
			if($lastInsertid>0){
				$message					=		array('order_total' =>$order_total);
				header('Content-type: application/json');
				echo json_encode($message);
			}
		}
	}
	
}	