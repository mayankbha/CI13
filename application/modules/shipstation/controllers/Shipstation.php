<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipstation extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */

		//Calling cURL Library
		//$this->load->library('curl');

		//Calling Email Library
		$this->load->library('email');
	}

	public function index() {
		$shipstationInfoCount = $this->common->getRecordCount('shipstation', array('user_id' =>$this->session->userdata('user_session')['id']));

		if($shipstationInfoCount > 0) {
			$shipstationDetail = $this->common->getRecord('shipstation', array('user_id' => $this->session->userdata('user_session')['id']));

			$this->data['api_key'] = $shipstationDetail[0]->api_key;
			$this->data['api_secret'] = $shipstationDetail[0]->api_secret;

			$this->data['shipstationInfoHtml'] = $this->common->getSingleRecord('shipstation', array('user_id' => $this->session->userdata('user_session')['id']));
		} else {
			$this->data['shipstationInfoHtml'] = '';
		}

		$this->data['shipstationInfo'] = $this->load->view('ajax/shipstation', $this->data['shipstationInfoHtml'], true);

		$this->layout->title('shipstation Details | Hubway');

		$this->layout->view('shipstation', $this->data);
	}

	public function validateShipstationAccount() {
		if($this->input->post()) {
			$ShipStationInfo = $this->input->post('ShipStationInfo');

			if(!empty($ShipStationInfo['api_key']) && !empty($ShipStationInfo['api_secret'])) {
				$str = $ShipStationInfo['api_key'].':'.$ShipStationInfo['api_secret'];
			} else {
				$str = 'sasdss:dggffgf';
			}

			//echo $str;

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders");

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($str)));

			$response = curl_exec($ch);

			curl_close($ch);

			$object = json_decode($response);

			$pos = strpos($response, 'orders');

			if($pos === false) {
				$this->session->set_flashdata('shipstation_api_key', $ShipStationInfo['api_key']);
				$this->session->set_flashdata('shipstation_api_key_screct', $ShipStationInfo['api_secret']);

				$this->session->set_flashdata('error_msg', "We're unable to validate your account!");
			} else {
				if((int)$object->total < 1) {
					$this->session->set_flashdata('success_msg', "We have successfully validated your ShipStation account and found no orders in your account!");
				} else {
					$this->session->set_flashdata('success_msg', "We have successfully validated your ShipStation account and found ".(int)$object->total." orders in your account. All orders has been synchronized successfully.");

					foreach($object->orders as $key => $value) {
						if($value->orderStatus == "shipped") {
							$orderstatus = 4;
						} else if($value->orderStatus == "cancelled") {
							$orderstatus = 0;
						} else {
							$orderstatus = 5;
						}

						$shipped = $value->orderStatus;

						$order	= array(
									'order_number' => $value->orderNumber,
									'createdate' => $value->createDate,
									'order_name' => 'HUB-Ship-ORDR-'.$value->orderNumber,
									//'item_name' => $value->name,
									//'quantity' => $value->quantity,
									//'item_price' => $value->unitPrice,
									//'item_image' => $value->imageUrl,
									'customer_name' => $value->billTo->name,
									'customer_id' => $value->customerId,
									'order_shipby' => $value->shipByDate,
									'user_id' => $this->session->userdata('user_session')['id'],
									'buyer_addressline1' => $value->billTo->street1,
									'buyer_addressline2' => $value->billTo->street2,
									'buyer_state' => $value->billTo->state,
									'tax_paid' => $value->taxAmount,
									'buyer_zip' => $value->billTo->postalCode,
									'buyer_contactoffice' => $value->billTo->phone,
									'buyer_contactphone' => $value->billTo->phone,
									'buyer_email' => $value->customerEmail,
									'buyer_companyname' => $value->billTo->company,
									//'customer_name' => $value->billTo->name,
									'shipping_paid' => $value->shippingAmount,
									'customer_note' => $value->customerNotes,
									//'buyer_note' => $object->orders->orderStatus
									'internet_note' => $value->internalNotes,
									'gift_note' => $value->giftMessage,
									'customer_field_1' => $value->advancedOptions->customField1,
									'shipto_companyname' => $value->shipTo->company,
									'shipto_recipientname' => $value->shipTo->name,
									'shipto_addressline1' => $value->shipTo->street1,
									'shipto_addressline2' => $value->shipTo->street2,
									'shipto_country' => $value->shipTo->country,
									'shipto_state' => $value->shipTo->state,
									'shipto_zip' => $value->shipTo->postalCode,
									'shipto_contactphone' => $value->shipTo->phone,
									'shipto_contactphone' => $value->shipTo->residential,
									'order_total' => $value->orderTotal,
									'order_date' => $value->orderDate,
									'order_status' => $orderstatus,
									'order_type' => 1
								);

						$lastInsertid = $this->common->saveRecord('orders', $order);

						$order_total_qty = 0;

						foreach($value->items as $item_key => $item_val) {
							$order_total_qty += $item_val->quantity;

							$item = array(
										'order_id' => $lastInsertid,
										'createDate' => $item_val->createDate,
										'unitPrice' => $item_val->unitPrice,
										'item_image' => $item_val->imageUrl,
										'item_name' => $item_val->name,
										'sku' => $item_val->sku,
										'condition' => 'NEW',
										'quantity' => $item_val->quantity,
										'productId' => $item_val->productId
									);

							$this->common->saveRecord('product_to_order', $item);
						}

						$this->common->updateRecord('orders', array('quantity' => $order_total_qty), array('order_id' => $lastInsertid));
					}
				}
 
				$this->common->saveRecord('shipstation', array('user_id' => $this->session->userdata('user_session')['id'], 'api_key' => $ShipStationInfo['api_key'], 'api_secret' => $ShipStationInfo['api_secret']));

				$to = $this->session->userdata('user_session')['email'];

				$data = array();

				$subject =  $this->lang->line('Shipstation_Account_Added');

				$message = $this->load->view('shipstationMailTemplate', $data , true);

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers .= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
				$headers .= 'Reply-To: Hubway@Hubway.com' . "\r\n";

				//mail($to, $subject, $message, $headers);				
			}

			echo 1;
		}
	}

	public function syncUserAllRecords($user_id, $page = 1) {
		//echo 'User ID :: '.$user_id.' Page :: '.$page; die;

		$shipstationDetail = $this->common->getRecord('shipstation', array('user_id' => $this->session->userdata('user_session')['id']));

		if(!empty($shipstationDetail))
			$str = $shipstationDetail[0]->api_key.':'.$shipstationDetail[0]->api_secret;
		else
			$str = 'sdffdffs:sdfsdfds';

		$ch = curl_init();

		//curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders?page=$page&pageSize=500");

		curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders?page=$page&pageSize=500&createDateStart=2016-01-01&createDateEnd=2017-05-01");

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($str)));

		$response = curl_exec($ch);

		curl_close($ch);

		$object = json_decode($response);

		$pos = strpos($response, 'orders');

		if($pos !== false) {
			foreach($object->orders as $key => $value) {
				if($value->orderStatus == "shipped") {
					$orderstatus = 4;
				} else if($value->orderStatus == "cancelled") {
					$orderstatus = 0;
				} else {
					$orderstatus = 5;
				}

				$shipped = $value->orderStatus;

				$order	= array(
							'order_number' => $value->orderNumber,
							'createdate' => $value->createDate,
							'order_name' => 'HUB-Ship-ORDR-'.$value->orderNumber,
							//'item_name' => $value->name,
							//'quantity' => $value->quantity,
							//'item_price' => $value->unitPrice,
							//'item_image' => $value->imageUrl,
							'customer_name' => $value->billTo->name,
							'customer_id' => $value->customerId,
							'order_shipby' => $value->shipByDate,
							'user_id' => $user_id,
							'buyer_addressline1' => $value->billTo->street1,
							'buyer_addressline2' => $value->billTo->street2,
							'buyer_state' => $value->billTo->state,
							'tax_paid' => $value->taxAmount,
							'buyer_zip' => $value->billTo->postalCode,
							'buyer_contactoffice' => $value->billTo->phone,
							'buyer_contactphone' => $value->billTo->phone,
							'buyer_email' => $value->customerEmail,
							'buyer_companyname' => $value->billTo->company,
							//'customer_name' => $value->billTo->name,
							'shipping_paid' => $value->shippingAmount,
							'customer_note' => $value->customerNotes,
							//'buyer_note' => $object->orders->orderStatus
							'internet_note' => $value->internalNotes,
							'gift_note' => $value->giftMessage,
							'customer_field_1' => $value->advancedOptions->customField1,
							'shipto_companyname' => $value->shipTo->company,
							'shipto_recipientname' => $value->shipTo->name,
							'shipto_addressline1' => $value->shipTo->street1,
							'shipto_addressline2' => $value->shipTo->street2,
							'shipto_country' => $value->shipTo->country,
							'shipto_state' => $value->shipTo->state,
							'shipto_zip' => $value->shipTo->postalCode,
							'shipto_contactphone' => $value->shipTo->phone,
							'shipto_contactphone' => $value->shipTo->residential,
							'order_total' => $value->orderTotal,
							'order_date' => $value->orderDate,
							'order_status' => $orderstatus,
							'order_type' => 1
						);

				$lastInsertid = $this->common->saveRecord('orders', $order);

				$order_total_qty = 0;

				foreach($value->items as $item_key => $item_val) {
					$order_total_qty += $item_val->quantity;

					$item = array(
								'order_id' => $lastInsertid,
								'createDate' => $item_val->createDate,
								'unitPrice' => $item_val->unitPrice,
								'item_image' => $item_val->imageUrl,
								'item_name' => $item_val->name,
								'sku' => $item_val->sku,
								'condition' => 'NEW',
								'quantity' => $item_val->quantity,
								'productId' => $item_val->productId
							);

					$this->common->saveRecord('product_to_order', $item);
				}

				$this->common->updateRecord('orders', array('quantity' => $order_total_qty), array('order_id' => $lastInsertid));
			}

			echo "<pre>"; print_r($object->orders);
		}
	}

	/*public function updateOrder() {
		$shipstationInfo = $this->common->getRecord('shipstation', array('user_id' => $this->session->userdata('user_session')['id']));

		if(!empty($shipstationInfo)) {
			$str = $shipstationInfo[0]->api_key.':'.$shipstationInfo[0]->api_secret;
		} else {
			$str = '';
		}

		$ch = curl_init();

		//curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/products?New%20item=");

		//curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders?page=10&pageSize=500&createDateStart=2017-01-01&createDateEnd=2017-05-31");

		//curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders?storeId=220974");

		curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders?page=1&pageSize=500");

		//curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($str)));

		$response = curl_exec($ch);

		curl_close($ch);

		$object = json_decode($response);

		//echo "<pre>"; print_r($object);

		//echo $object->pages.'<br><br>';

		$pos = strpos($response, 'orders');

		if($pos === false) {
			echo "We're unable to validate your account, ".$response. "found!";
		} else {
			if((int)$object->total < 1) {
				echo "We have successfully validated your ShipStation account and found no orders in your account!";
			} else {
				//echo "<pre>"; print_r($object->orders);

				foreach($object->orders as $key => $value) {
					if($value->orderStatus == "shipped") {
						$orderstatus = 4;
					} else if($value->orderStatus == "cancelled") {
						$orderstatus = 0;
					} else {
						$orderstatus = 5;
					}

					$shipped = $value->orderStatus;

					$order	= array(
								'order_number' => $value->orderNumber,
								'createdate' => $value->createDate,
								'order_name' => 'HUB-Ship-ORDR-'.$value->orderNumber,
								//'item_name' => $value->name,
								//'quantity' => $value->quantity,
								//'item_price' => $value->unitPrice,
								//'item_image' => $value->imageUrl,
								'customer_name' => $value->billTo->name,
								'customer_id' => $value->customerId,
								'order_shipby' => $value->shipByDate,
								'user_id' => $this->session->userdata('user_session')['id'],
								'buyer_addressline1' => $value->billTo->street1,
								'buyer_addressline2' => $value->billTo->street2,
								'buyer_state' => $value->billTo->state,
								'tax_paid' => $value->taxAmount,
								'buyer_zip' => $value->billTo->postalCode,
								'buyer_contactoffice' => $value->billTo->phone,
								'buyer_contactphone' => $value->billTo->phone,
								'buyer_email' => $value->customerEmail,
								'buyer_companyname' => $value->billTo->company,
								//'customer_name' => $value->billTo->name,
								'shipping_paid' => $value->shippingAmount,
								'customer_note' => $value->customerNotes,
								//'buyer_note' => $object->orders->orderStatus
								'internet_note' => $value->internalNotes,
								'gift_note' => $value->giftMessage,
								'customer_field_1' => $value->advancedOptions->customField1,
								'shipto_companyname' => $value->shipTo->company,
								'shipto_recipientname' => $value->shipTo->name,
								'shipto_addressline1' => $value->shipTo->street1,
								'shipto_addressline2' => $value->shipTo->street2,
								'shipto_country' => $value->shipTo->country,
								'shipto_state' => $value->shipTo->state,
								'shipto_zip' => $value->shipTo->postalCode,
								'shipto_contactphone' => $value->shipTo->phone,
								'shipto_contactphone' => $value->shipTo->residential,
								'order_total' => $value->orderTotal,
								'order_date' => $value->orderDate,
								'order_status' => $orderstatus,
								'order_type' => 1
							);

					$lastInsertid = $this->common->saveRecord('orders', $order);

					$order_total_qty = 0;

					foreach($value->items as $item_key => $item_val) {
						$order_total_qty += $item_val->quantity;

						$item = array(
									'order_id' => $lastInsertid,
									'createDate' => $item_val->createDate,
									'unitPrice' => $item_val->unitPrice,
									'item_image' => $item_val->imageUrl,
									'item_name' => $item_val->name,
									'sku' => $item_val->sku,
									'condition' => 'NEW',
									'quantity' => $item_val->quantity,
									'productId' => $item_val->productId
								);

						$this->common->saveRecord('product_to_order', $item);
					}

					$this->common->updateRecord('orders', array('quantity' => $order_total_qty), array('order_id' => $lastInsertid));
				}
			}
		}
	}*/

	public function deleteAccount() {
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$value = $this->input->post('value');

		$response = $this->common->deleteRecord($table, $column, $value);

		echo $response;
	}
}

/* End of file payment.php */
/* Location: ./application/controllers/payment.php */