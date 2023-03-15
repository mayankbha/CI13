<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ViewShipmentAll extends Admin_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('admin_session')){
			redirect(base_url(), 'refresh');
		}
	
		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}
	
	
	public function index() {
		$result  = $this->common->getRecord('shipments');

		//echo "<pre>"; print_r($result);

		$data = "";

		if(!empty($result)) {
			foreach($result as $key => $val) {
				//$data[] = $val;

				$data[$key]['shipping_id'] = $val->shipping_id;
				$data[$key]['shipment_id'] = $val->shipment_id;
				$data[$key]['shipment_name'] = $val->shipment_name;
				$data[$key]['booking_number'] = $val->booking_number;
				$data[$key]['created'] = $val->created;

				$getShipmentAllProducts = $this->common->getRecord('shipment_received_items', array('shipment_id' => $val->shipment_id));

				$received = 0;
				$last_updated ='';

				if(!empty($getShipmentAllProducts)) {
					foreach($getShipmentAllProducts as $key1 => $product) {
						$received += $product->received;

						$last_updated = $product->received_date;
					}
				}

				$data[$key]['last_updated'] = $last_updated;
				$data[$key]['unit'] = $val->unit;
				$data[$key]['received'] = $received;

				$data[$key]['shipped'] = $val->unit;

				if($val->unit == $received)
					$data[$key]['status'] = 1;
				else
					$data[$key]['status'] = 0;

				$data[$key]['mskus'] = $val->mskus;
			}

			//echo "<pre>"; print_r($data); die;
		}

		$data['result'] = $data;
		
		$this->layout->title('Shipment | Hubway');

		$this->layout->view('viewshipment', $data);
	}
	
	public function shipmentDetail($id = null) {
		$data['shipment_id'] = $id;

		$id = base64_decode(urldecode($id));

		$getShipmentDetail = $this->common->getRecord('shipments', array('shipment_id' => $id));

		//echo "<pre>"; print_r($getShipmentDetail); die;

		$data['shipped'] = $getShipmentDetail[0]->unit;

		$data['shipment_name'] 	= 	$getShipmentDetail[0]->shipment_name;
		$data['shipment'] 		= 	$getShipmentDetail[0];

		$address_id = $getShipmentDetail[0]->address_id;

		$getUserAddress = $this->common->getRecord('addresses', array('address_id' => $address_id));

		//echo "<pre>"; print_r($getUserAddress); die;

		$data['user_address'] = $getUserAddress[0];

		$getShipmentProductsDetail = $this->common->getRecord('product_to_shipments', array('shipment_id' => $id));

		$shipment_total_received_product = 0;

		$products = array();

		$unit	=	0;

		foreach($getShipmentProductsDetail as $key => $product) {
			$received = 0;

			$products[$key]['id'] = $product->id;

			$products[$key]['product_id'] = $product->product_id;

			$products[$key]['merchant_SKU'] = $product->merchant_SKU;
			$products[$key]['title'] = $product->title;
			$products[$key]['condition'] = $product->condition;
			$products[$key]['UPC'] = $product->UPC;
			$products[$key]['number_of_cases'] = $product->number_of_cases;
			$products[$key]['shipped'] = $product->shipment_quantity;
			
			if($getShipmentDetail[0]->shipping_plan_type == "Casepacked Products") {
				$unit += $product->number_of_cases;
			} else {
				$unit += $product->shipment_quantity; 
			}

			$getShipmentReceivedProducts = $this->common->getRecord('shipment_received_items', array('shipment_id' => $id, 'product_id' => $product->product_id));

			if(!empty($getShipmentReceivedProducts)) {
				foreach($getShipmentReceivedProducts as $key1 => $received_product) {
					$received += $received_product->received;
				}
			}

			$products[$key]['received'] = $received;

			$shipment_total_received_product += $received;
		}

		$data['shipment_total_received_product'] = $shipment_total_received_product;

		//echo "<pre>"; print_r($products); die;

		$data['shipmentProductsDetail'] = $products;
		$data['unit'] = $unit;

		$this->layout->title('Shipment | Hubway');

		$this->layout->view('shipmentdetail', $data);
	}

	public function showEditProductSection() {
		$shipment_id = base64_decode(urldecode($this->input->post('shipment_id')));
		$product_id = base64_decode(urldecode($this->input->post('product_id')));
		
		$col_id = $this->input->post('col_id');
		
		$getShipmentDetail = $this->common->getRecord('shipments', array('shipment_id' => $shipment_id));

		$getShipmentProducts = $this->common->getRecord('product_to_shipments', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

		$unit	=	0;

		$total_product_received = 0;

		foreach($getShipmentProducts as $key => $product) {
			if($getShipmentDetail[0]->shipping_plan_type == "Casepacked Products") {
				$unit += $product->number_of_cases;
			} else {
				$unit += $product->shipment_quantity; 
			}

			$getShipmentReceivedProducts = $this->common->getRecord('shipment_received_items', array('product_id' => $product->id));

			if(!empty($getShipmentReceivedProducts)) {
				foreach($getShipmentReceivedProducts as $key1 => $received_product) {
					$total_product_received += $received_product->received;
				}
			}
		}

		$getShipmentReceivedItems = $this->common->getRecord('shipment_received_items', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

		$getProduct = $this->common->getRecord('product_to_shipments', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

		//echo "<pre>"; print_r($getProduct);

		$data['shipped'] = $getProduct[0]->shipment_quantity;

		$productMSKUS = $getProduct[0]->merchant_SKU;
		$productAsin1 = $getProduct[0]->asin1;

		$getProductUnit = $this->common->getRecord('inventory_data', array('merchant_SKU' => $productMSKUS, 'asin1' => "$productAsin1"));

		//original unit from Amazon
		$product_length = $getProductUnit[0]->Length;
		$product_width = $getProductUnit[0]->Width;
		$product_height = $getProductUnit[0]->Height;

		//$product_weight = $getProductUnit[0]->Weight;

		//echo $product_length.' :: '.$product_width.' :: '.$product_height.'<br>';

		//measure real unit by divide them with 100 as we get hundredths of each unit from Amazon 
		$product_real_length = $product_length / 100;
		$product_real_width = $product_width / 100;
		$product_real_height = $product_height / 100;

		//$product_real_weight = $product_weight / 100;

		//echo $product_real_length.' :: '.$product_real_width.' :: '.$product_real_height.'<br>';

		//$product_unit = $product_real_length * $product_real_width * $product_real_height;

		$product_unit = $product_length * $product_width * $product_height;

		//echo $product_unit.'<br>';

		$data['product_unit'] = $product_unit;

		$received = 0;

		if(!empty($getShipmentReceivedItems)) {
			foreach($getShipmentReceivedItems as $key => $item) {
				$received += $item->received;
			}
		}

		//echo $unit.' :: '.$total_product_received.'<br>';

		//When shipment shipped items equals to received items, set shipment status to complete
		if($unit == $total_product_received)
			$this->common->updateRecord('shipments', array('status' => 6), array('shipment_id' => $shipment_id));

		$data['item_width'] = $product_width;
		$data['item_height'] = $product_height;
		$data['item_length'] = $product_length;

		$data['received'] = $received;

		$data['total_received_products'] = count($getShipmentReceivedItems);

		$data['shipment_id'] = $shipment_id;
		$data['product_id'] = $product_id;
		$data['col_id'] = $col_id;

		$data['shipmentReceivedItems'] = $getShipmentReceivedItems;

		echo $this->load->view('edit_product_section', $data, true);
	}

	public function saveShipmentReceivedInfo() {
		//echo "<pre>"; print_r($this->input->post()); die;

		$row_count = $this->input->post('row_count');

		$shipment_id = base64_decode(urldecode($this->input->post('shipment_id')));
		$product_id = base64_decode(urldecode($this->input->post('product_id')));

		//echo 'Shipment ID ::'.$shipment_id.' ==== Product ID :: '.$product_id; die;

		$getShipmentDetail = $this->common->getRecord('shipments', array('shipment_id' => $shipment_id));

		$getProductDetail = $this->common->getRecord('product_to_shipments', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

		$productMSKUS = $getProductDetail[0]->merchant_SKU;
		$productAsin1 = $getProductDetail[0]->asin1;

		$getItemInventoryDetail = $this->common->getRecord('inventory_data', array('merchant_SKU' => $productMSKUS, 'asin1' => "$productAsin1"));

		$shipped = $getProductDetail[0]->shipment_quantity;

		$data = array(
					'user_id' => $getShipmentDetail[0]->user_id,
					'shipment_id' => $shipment_id,
					'product_id' => $product_id,
					'received' => $this->input->post('received_items'),
					'received_date' => date('Y-m-d', strtotime($this->input->post('received_date'))),
					'comment' => $this->input->post('comment'),
					'cubic_feet' => $this->input->post('cubic_feet'),
					'total_cubic_feet' => $this->input->post('received_items') * $this->input->post('cubic_feet')
				);

		$inserted_id = $this->common->saveRecord('shipment_received_items', $data);

		$rcvd_item =  $this->common->getSingleRecord('warehouse_shipping_receiving', array('product_id' => $product_id));
		
		if(!empty($rcvd_item)) {
			if($rcvd_item->total_received < $rcvd_item->total_shipped)
				$totalrcvd = $rcvd_item->total_received + $this->input->post('received_items');
			else
				$totalrcvd = $rcvd_item->total_received;
		} else {
			$totalrcvd	=	$this->input->post('received_items');
		}

		$resData = array(
					'shipment_id' => $shipment_id,
					'product_id' => $product_id,
					'last_updated' => date('Y-m-d', strtotime($this->input->post('received_date'))),
					'total_received' => $totalrcvd,
					'total_shipped' => $this->input->post('shipped'),
					'comment' => $this->input->post('comment'),
					'created' => date('Y-m-d H:i:s')
				);

		$product_length_unit = $getItemInventoryDetail[0]->length_unit;
		$product_width_unit = $getItemInventoryDetail[0]->width_unit;
		$product_height_unit = $getItemInventoryDetail[0]->height_unit;
		$product_weight_unit = $getItemInventoryDetail[0]->weight_unit;

		$product_length = $getItemInventoryDetail[0]->Length;
		$product_width = $getItemInventoryDetail[0]->Width;
		$product_height = $getItemInventoryDetail[0]->Height;
		$product_weight = $getItemInventoryDetail[0]->Weight;

		$shipment_received_total_cubic_feet_per_container =  $this->input->post('received_items') * $this->input->post('cubic_feet');

		$getCharges = $this->common->getRecord('charges');

		$inbound_fee_charge = $getCharges[0]->inbound_fee;

		$inbound_fee = (($inbound_fee_charge * 100) * $shipment_received_total_cubic_feet_per_container) / 100;

		$transactions_data = array(
								'user_id' => $getShipmentDetail[0]->user_id,
								'shipment_id' => $shipment_id,
								'product_id' => $product_id,
								'product_length' => $product_length,
								'product_width' => $product_width,
								'product_height' => $product_height,
								'product_weight' => $product_weight,
								'product_length_unit' => $product_length_unit,
								'product_width_unit' => $product_width_unit,
								'product_height_unit' => $product_height_unit,
								'product_weight_unit' => $product_weight_unit,
								'shipment_received_item' => $this->input->post('received_items'),
								'shipment_recevied_cubic_feet_per_container' => $this->input->post('cubic_feet'),
								'shipment_received_total_cubic_feet_per_container' => $shipment_received_total_cubic_feet_per_container,
								'inbound_fee' => $inbound_fee,
								'transaction_date' => date('Y-m-d')
							);

		$this->common->saveRecord('transactions', $transactions_data);

		if(empty($rcvd_item)) {
			$inserted_id = $this->common->saveRecord('warehouse_shipping_receiving', $resData);
		} else {
			$inserted_id = 	$this->common->updateRecord('warehouse_shipping_receiving', $resData, array('product_id' => $product_id));
		}

		$getShipmentReceivedItems = $this->common->getRecord('shipment_received_items', array('product_id' => $product_id));

		$received = 0;

		if(!empty($getShipmentReceivedItems)) {
			foreach($getShipmentReceivedItems as $key => $item) {
				$received += $item->received;
			}
		}

		if($inserted_id > 0)
			echo '1&&&&'.$row_count.'&&&&'.$shipped.'&&&&'.$received;
		else
			echo '0&&&&'.$row_count.'&&&&'.$shipped.'&&&&'.$received;
	}
}	