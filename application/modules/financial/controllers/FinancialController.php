<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FinancialController extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect(base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	}

	public function index() {
		//echo "<pre>"; print_r($this->session->userdata['user_session']['id']); die;

		$getUserInfo = $this->common->getRecord('user', array('id' => $this->session->userdata['user_session']['id']));

		//echo "<pre>"; print_r($getUserInfo);

		//$start_financial_year = date('d-m-Y', strtotime($getUserInfo[0]->created_at.' +60 days'));

		$start_financial_year = date('01-01-Y', strtotime($getUserInfo[0]->created_at));
		$end_financial_year = date('31-12-Y', strtotime('Y'));

		//echo $start_financial_year.' :: '.$end_financial_year; die;

		$ts1 = strtotime($start_financial_year);
		$ts2 = strtotime($end_financial_year);

		$startYear = date('Y', $ts1);
		$endYear = date('Y', $ts2);

		//echo $startYear.' :: '.$endYear; die;

		$pervStartYear = $startYear - 1;
		//$nextEndyear = $endYear + 1;

		//$pervStartYear = $startYear;
		$nextEndyear = $endYear;

		//echo $pervStartYear.' :: '.$nextEndyear; die;

		$year_range = array();

		for($i = $pervStartYear; $i < $nextEndyear; $i++) {
			$year_range[] = $i.' - '.($i + 1);
		}

		//echo "<pre>"; print_r($year_range); die;

		$current_start_financial_year = date('Y') - 1;
		$current_end_financial_year = date('Y');

		$current_financial_year = $current_start_financial_year.' - '.$current_end_financial_year;

		//echo $current_financial_year.'<br>';

		$date_arr = $this->getDateRangeBetweenGivenDate($current_financial_year);

		//echo "<pre>"; print_r($date_arr);

		$monday = strtotime("last monday");
		$monday = date('w', $monday) == date('w') ? $monday+7*86400 : $monday;

		$sunday = strtotime(date("d-m-Y", $monday)." +6 days");

		$current_week_start_date = date("d-m-Y", $monday);
		$current_week_end_date = date("d-m-Y", $sunday);

		$current_date_range = $current_week_start_date.'--'.$current_week_end_date;

		//echo "Current week range from $current_date_range";

		$shipments_total_cost = $this->calculateTotalCost($current_date_range);

		$shipments_total_cost_explode = explode('&&&&', $shipments_total_cost);

		$total_freight_in = $shipments_total_cost_explode[0];
		$total_stay = $shipments_total_cost_explode[1];
		$total_freight_out = $shipments_total_cost_explode[2];
		$total_unit_processing_fee = $shipments_total_cost_explode[3];

		$subtotal = $shipments_total_cost_explode[4];

		//die;

		$data['total_freight_in'] = $total_freight_in;
		$data['total_stay'] = $total_stay;
		$data['total_freight_out'] = $total_freight_out;
		$data['total_unit_processing_fee'] = $total_unit_processing_fee;

		$data['subtotal'] = $subtotal;

		$data['current_financial_year'] = $current_financial_year;

		$data['year_range'] = $year_range;
		$data['date_range'] = $date_arr;

		$this->layout->title('Financial | Hubway');
		$this->layout->view('financial', $data);
	}

	public function getDateRangeBetweenGivenDate($current_financial_year, $ajax=false) {
		//echo $current_financial_year; die;

		$current_financial_year_explode = explode('-', trim($current_financial_year));

		//echo "<pre>"; print_r($current_financial_year_explode); die;

		$current_start_financial_year = trim(urldecode($current_financial_year_explode[0]));
		$current_end_financial_year = trim(urldecode($current_financial_year_explode[1]));

		//echo $current_start_financial_year.' :: '.$current_end_financial_year;

		$getUserInfo = $this->common->getRecord('user', array('id' => $this->session->userdata['user_session']['id']));

		//echo "<pre>"; print_r($getUserInfo);

		//Create the from and to date
		//$start_date = date('d-m-Y', strtotime($getUserInfo[0]->created_at.' +60 days'));
		//$start_date = date("01-01-$current_start_financial_year");
		$start_date = date('d-m-Y', strtotime($getUserInfo[0]->created_at));
		$end_date = date("d-m-Y");

		//$end_date = date("31-12-$current_end_financial_year");

		//echo $start_date.' :: '.$end_date; die;

		$start_date_timestamp = strtotime("$start_date");
		$last_date_timestamp = strtotime("$end_date");

		//Get the time interval to get the tue and Thurs days
		$no_of_days = ($last_date_timestamp - $start_date_timestamp) / 86400; //the diff will be in timestamp hence dividing by timestamp for one day = 86400

		$nextDate = '';
		$date_arr = array();

		$current_date = date('d-m-Y');

		//echo $current_date;

		for($i = 0; $i <= $no_of_days; $i += 7) {
			//echo $i.'<br>';

			$startDate = date('d-m-Y', strtotime($start_date. "+$i days"));

			if($nextDate != '') {
				//echo 'In If';

				$nextDate = date('d-m-Y', strtotime($startDate. "+8 days"));

				$i += 1;

				$startDate = date('d-m-Y', strtotime($start_date. "+$i days"));
			} else {
				//echo 'In Else';

				$nextDate = date('d-m-Y', strtotime($startDate. "+7 days"));
			}

			if(date('Y-m', strtotime($startDate)) == date('Y-m', strtotime($current_date))) {
				if(($startDate <= $current_date) && ($nextDate >= $current_date))
					$date_arr[$i]['current_date'] = 1;
				else
					$date_arr[$i]['current_date'] = 0;
			} else {
				$date_arr[$i]['current_date'] = 0;
			}

			$date_arr[$i]['start_date'] = $startDate;
			$date_arr[$i]['next_date'] = $nextDate;
		}

		//echo "<pre>"; print_r($date_arr);

		if($ajax == false) {
			return $date_arr;
		} else if($ajax == true) {
			$options = '';

			foreach($date_arr as $key => $date) {
				$options .= '<option value="'.$date['start_date'].'--'.$date['next_date'].'">('.date('j M', strtotime($date['start_date'])).' - '.date('j M', strtotime($date['next_date'])).') '.date('Y', strtotime($date['next_date'])).'</option>';
			}

			echo $options;
		} 
	}

	public function calculateTotalCost($date_range, $ajax = false) {
		$date_range_explode = explode('--', $date_range);

		$start_date = $date_range_explode[0];
		$end_date = $date_range_explode[1];

		//echo $start_date.' :: '.$end_date;

		$user_id = $this->session->userdata['user_session']['id'];

		$getShipmentDetail = $this->common->getShipmentsBetweenDates(array('user_id' => $user_id), $start_date, $end_date);

		//echo "<pre>"; print_r($getShipmentDetail); die;

		$current_date = date('Y-m-d');
		$current_date_timestamp = strtotime(date('Y-m-d'));

		$total_freight_in = 0;
		$total_stay = 0;
		$total_freight_out = 0;
		$total_unit_processing_fee = 0;

		$subtotal = 0;

		foreach($getShipmentDetail as $key1 => $val1) {
			$shipment_id = $val1->shipment_id;

			$getShipmentReceived = $this->common->getShipmentsReceivedDate('shipment_received_items', array('shipment_id' => $shipment_id));

			$shipment_received_date = $getShipmentReceived[0]->received_date;

			$shipment_received_timestamp = strtotime($shipment_received_date);

			$total_shipment_stay_days = ceil(abs($current_date_timestamp - $shipment_received_timestamp) / 86400);

			//echo $total_shipment_stay_days;

			$freight_in = $val1->inbound_fee;
			$storage_fee = $val1->storage_fee;
			$unit_processing_fee = $val1->	processing_fee;

			if($total_shipment_stay_days > 45) {
				$total_stay += $storage_fee;
			}

			$total_freight_in += $freight_in;

			//$total_freight_out += $freight_out * $val1->total_cubic_feet;

			$total_unit_processing_fee += $unit_processing_fee;

			$subtotal = ($total_freight_in + $total_stay + $total_freight_out + $total_unit_processing_fee);

			//die;
		}

		if($ajax == false) {
			return $total_freight_in.'&&&&'.$total_stay.'&&&&'.$total_freight_out.'&&&&'.$total_unit_processing_fee.'&&&&'.$subtotal;
		} else if($ajax == true) {
			echo $total_freight_in.'&&&&'.$total_stay.'&&&&'.$total_freight_out.'&&&&'.$total_unit_processing_fee.'&&&&'.$subtotal;
		}
	}

	public function shipmentFinancialDetail() {
		//echo "<pre>"; print_r($this->input->post());

		$date_range = $this->input->post('date_range');

		$date_range_explode = explode('--', $date_range);

		$start_date = $date_range_explode[0];
		$end_date = $date_range_explode[1];

		//echo $start_date.' :: '.$end_date;

		$current_date = date('Y-m-d');
		$current_date_timestamp = strtotime(date('Y-m-d'));

		$user_id = $this->session->userdata['user_session']['id'];

		$getShipmentList = $this->common->getShipmentsListingBetweenDates($user_id, $start_date, $end_date);

		//echo "<pre>"; print_r($getShipmentList); die;

		$stay = 0.15;
		$freight_in = 0.15;
		$freight_out = 0.15;
		$unit_processing_fee = .01;

		$shipmentList = array();

		foreach($getShipmentList as $shipment_key => $shipment) {
			$shipment_id = $shipment->shipment_id;

			$getShipmentDetail = $this->common->getRecord('shipments', array('shipment_id' => $shipment_id, 'user_id' => $user_id));

			$shipmentList[$shipment_key]['created_date'] = $getShipmentDetail[0]->created;
			$shipmentList[$shipment_key]['shipment_name'] = $getShipmentDetail[0]->shipment_name;
			$shipmentList[$shipment_key]['shipment_id'] = $shipment_id;

			$shipment_total_storage_fee = 0;
			$shipment_total_stay = 0;
			$shipment_total_freight_in = 0;
			$shipment_total_freight_out = 0;
			$shipment_total_unit_processing_fee = 0;

			$shipment_total_units = 0;
			$shipment_total_cost = 0;

			$getShipmentsProducts = $this->common->getRecord('product_to_shipments', array('shipment_id' => $shipment_id, 'user_id' => $user_id));

			$product_received_unit = 0;
			$product_received_total_cubic_feet = 0;

			foreach($getShipmentsProducts as $shipment_product_key => $shipment_product) {
				$product_id = $shipment_product->id;

				$get_shipment_last_received_date_result = $this->common->getShipmentsLastReceivedDate('shipment_received_items', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

				$get_shipment_last_received_date = $get_shipment_last_received_date_result[0]->received_date;

				$getShipmentsProductsReceivedDetail = $this->common->getRecord('shipment_received_items', array('shipment_id' => $shipment_id, 'product_id' => $product_id));

				foreach($getShipmentsProductsReceivedDetail as $shipment_product_received_key => $shipment_product_received) {
					$shipment_product_received_unit = $shipment_product_received->received;
					$product_received_cubic_feet = $shipment_product_received->cubic_feet;
					$product_received_total_cubic_feet = $shipment_product_received->total_cubic_feet;

					$product_received_unit += $shipment_product_received_unit;
					$product_received_total_cubic_feet += $product_received_total_cubic_feet;
				}
			}

			$shipment_total_stay += $stay * $product_received_total_cubic_feet;
			$shipment_total_freight_in += $freight_in * $product_received_total_cubic_feet;
			$shipment_total_freight_out += $freight_out * $product_received_total_cubic_feet;
			$shipment_total_unit_processing_fee += $unit_processing_fee * $product_received_total_cubic_feet;

			$shipment_total_storage_fee += ($shipment_total_stay + $shipment_total_freight_in + $shipment_total_freight_out + $shipment_total_unit_processing_fee);

			$shipment_total_units += $product_received_unit;

			$shipment_total_cost += $shipment_total_storage_fee;

			$shipmentList[$shipment_key]['units_received'] = $shipment_total_units;
			$shipmentList[$shipment_key]['total'] = $shipment_total_cost;

			$shipmentList[$shipment_key]['get_shipment_last_received_date'] = $get_shipment_last_received_date;
		}

		$data['shipmentLists'] = $shipmentList;

		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;

		$this->layout->title('Financial Detail | Hubway');
		$this->layout->view('shipment_financial_detail', $data);
	}

	public function financialDetail() {
		//echo "<pre>"; print_r($this->input->post()); die;

		$shipment_id = $this->input->post('shipment_id');
		$start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
		$end_date = date('Y-m-d', strtotime($this->input->post('end_date')));
		
		$user_id = $this->session->userdata['user_session']['id'];

		$getShipmentDetails = $this->common->getShipmentsReceivedListingBetweenDates($shipment_id, $user_id, $start_date, $end_date);

		//echo "<pre>"; print_r($getShipmentDetails);

		$stay = 0.15;
		$freight_in = 0.15;
		$freight_out = 0.15;
		$unit_processing_fee = .01;

		$shipment_received_list = array();

		foreach($getShipmentDetails as $shipment_product_key => $shipment_product) {
			$product_id = $shipment_product->id;

			$shipment_received_list[$shipment_product_key]['shipment_received'] = $shipment_product->received;
			$shipment_received_list[$shipment_product_key]['shipment_received_date'] = $shipment_product->received_date;
			$shipment_received_list[$shipment_product_key]['cubic_feet'] = $shipment_product->cubic_feet;
			$shipment_received_list[$shipment_product_key]['total_cubic_feet'] = $shipment_product->total_cubic_feet;

			$shipment_product_total_stay = $stay * $shipment_product->total_cubic_feet;
			$shipment_product_total_freight_in = $freight_in * $shipment_product->total_cubic_feet;
			$shipment_product_total_freight_out = $freight_out * $shipment_product->total_cubic_feet;
			$shipment_product_total_unit_processing_fee = $unit_processing_fee * $shipment_product->total_cubic_feet;

			$shipment_product_total_storage_fee = ($shipment_product_total_stay + $shipment_product_total_freight_in + $shipment_product_total_freight_out + $shipment_product_total_unit_processing_fee);

			$shipment_received_list[$shipment_product_key]['shipment_product_total'] = $shipment_product_total_storage_fee;
		}

		//echo "<pre>"; print_r($shipment_received_list); die;

		$data['shipment_received_list'] = $shipment_received_list;

		$data['shipment_id'] = $shipment_id;

		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;

		$this->layout->title('Financial Detail | Hubway');
		$this->layout->view('financial_detail', $data);
	}
}

/* End of file warehouse.php */
/* Location: ./application/controllers/warehouse.php */