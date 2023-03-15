<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends MY_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index() {
		echo "xxxxxxxxxxxxxxxxxxxx";
	}

	public function saveStorageFee() {
		$getCharges = $this->common->getRecord('chareges');
		$storage_fee = $getCharges->storage_fee;

		$getUserList = $this->common->getRecord('user');

		if(!empty($getUserList)) {
			foreach($getUserList as $user_key => $user) {
				$user_id = $user->id;

				$getUserShipmentList = $this->common->getRecord('shipments', array('user_id' => $user_id));

				if(!empty($getUserShipmentList)) {
					foreach($getUserShipmentList as $user_shipment_list_key => $user_shipment) {
						$shipment_id = $user_shipment->shipment_id;

						$getUserShipmentProducts = $this->common->getRecord('product_to_shipments', array('shipment_id' => $shipment, 'user_id' => $user_id));

						if(!empty($getUserShipmentProducts)) {
							foreach($getUserShipmentProducts as $user_shipment_product_key => $user_shipment_product) {
								$product_id = $user_shipment_product->product_id;

								$getUserShipmentReceivedProducts = $this->common->getRecord('shipment_received_items', array('shipment_id' => $shipment, 'product_id' => $product_id));

								if(!empty($getUserShipmentReceivedProducts)) {
									foreach($getUserShipmentReceivedProducts as $user_shipment_received_product_key => $user_shipment_received_product) {
										$item_received = $user_shipment_received_product->received;
										$item_cubic_feet_per_container = $user_shipment_received_product->cubic_feet;

										$item_total_cubic_feet_per_container = $item_received * $item_cubic_feet_per_container;

										$getUserOrdersProducts = $this->common->getUserOrder($user_id, $product_id);

										$user_order_product_qty = 0;

										if(!empty($getUserOrdersProducts)) {
											foreach($getUserOrdersProducts as $user_order_product_key => $user_product_order) {
												$user_order_product_qty += $user_order->quantity;
											}
										}

										$item_received_remaining = $item_received - $user_order_product_qty;

										$item_total_cubic_feet_per_container_remaining = $item_received_remaining * $item_cubic_feet_per_container;

										$item_storage_fee = $storage_fee * $item_total_cubic_feet_per_container_remaining;

										$data = array(
													'user_id' => $user_id,
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
													'shipment_received_item' => $item_received,
													'shipment_received_cubic_feet_per_container' => $item_cubic_feet_per_container,
													'shipment_received_total_cubic_feet_per_container' => $item_total_cubic_feet_per_container,
													'storage_fee' => $item_storage_fee,
													'transaction_date' => date('Y-m-d')
												);

										$this->common->saveRecord('transactions', $data);
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

/* End of file cron.php */
/* Location: ./application/controllers/cron.php */