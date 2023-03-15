<?php
class Common_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	//Function to get records count of a table
	public function getRecordCount($table, $where=array()) {
		if(empty($where))
			$get_record_count_qry = $this->db->get($table);
		else
			$get_record_count_qry = $this->db->get_where($table, $where);

		return $get_record_count_qry->num_rows();
	}

	//Function to get single record of a table
	public function getSingleRecord($table, $where=array()) {
		if(empty($where))
			$get_single_record_qry = $this->db->get($table);
		else
			$get_single_record_qry = $this->db->get_where($table, $where);

		if($get_single_record_qry->num_rows() > 0)
			return $get_single_record_qry->row();
	}

	//Function to get records of a table
	public function getRecord($table, $where=array()) { 	
		if(empty($where))
			$get_record_qry = $this->db->get($table);
		else
			$get_record_qry = $this->db->get_where($table, $where);

		if($get_record_qry->num_rows() > 0)
			return $get_record_qry->result();
	}

	public function getRecordOrderby($table, $where=array(), $order_by=null, $sort=null) { 
		$get_record_qry = $this->db->order_by($order_by, $sort)->get_where($table, $where);
		if($get_record_qry->num_rows() > 0)
			return $get_record_qry->result();
	}

	//Function to get records of a table
	public function getRecordOrder($table, $where=array()) { 	
		if(empty($where))
			$get_record_qry = $this->db->order_by("address_id","desc")->get($table);
		else
			$get_record_qry = $this->db->order_by("address_id","desc")->get_where($table, $where);

		if($get_record_qry->num_rows() > 0)
			return $get_record_qry->result();
	}
	
	//Function to get records with join
	public function getRecordWithJoinuserOrder($where=array()) {
		$this->db->select('*');

		$this->db->from('orders');
		$this->db->join('product_to_order', 'product_to_order.order_id = orders.order_id');
		$this->db->where($where);
		//$this->db->group_by('block_out_event_week_day.event_week_day_availability_id');
		$this->db->order_by('orders.order_id');

		$shipments = $this->db->get();

		return  $shipments->result();
	}
	
	//Function to get records and group by given column of a table
	public function getRecordGroupBy($table, $where=array(), $group_by) { 	
		if(empty($where))
			$get_record_qry = $this->db->group_by($group_by)->get($table);
		else
			$get_record_qry = $this->db->group_by($group_by)->get_where($table, $where);

		if($get_record_qry->num_rows() > 0)
			return $get_record_qry->result();
	}

	//Function to save record in a table
	public function saveRecord($table, $data) {
		$this->db->insert($table, $data);

		return $this->db->insert_id();
	}

	//Function to update a record in a table
	public function updateRecord($table, $data, $where=array()) {
		$this->db->update("$table", $data, $where);

		return 1;
	}

	//Function to get records with join
	public function getRecordWithJoin($where=array()) {
		$this->db->select('*');

		$this->db->from('shipments');
		$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id');
		$this->db->where($where);
		//$this->db->group_by('block_out_event_week_day.event_week_day_availability_id');
		$this->db->order_by('shipments.shipment_id');

		$shipments = $this->db->get();

		return  $shipments->result();
	}

	//Function to delete any record from table
	public function deleteRecord($table, $column, $value) {
		$this->db->delete("$table", array("$column" => $value));

		return 1;
	}

	public function getProduct_to_shipments($where) {
		$this->db->select('shipments.*, COUNT(product_to_shipments.product_id) as num_of_pro')->from('shipments')->order_by('shipments.shipment_id', 'desc');
		$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id')->group_by('product_to_shipments.shipment_id');
		$this->db->where($where);
		$shipments = $this->db->get();
		return  $shipments->result();
	}

	public function getProduct_to_order($where) {
		$this->db->select('orders.*, COUNT(product_to_order.order_id) as num_of_item')->from('orders')->order_by('orders.order_id', 'desc');
		$this->db->join('product_to_order', 'product_to_order.order_id = orders.order_id')->group_by('product_to_order.order_id');
		$this->db->where($where);
		$shipments = $this->db->get();
		return  $shipments->result();
	}

	public function getProduct_to_order2($where, $where2) {
		$this->db->select('orders.*, COUNT(product_to_order.order_id) as num_of_item')->from('orders')->order_by('orders.order_id', 'desc');
		$this->db->join('product_to_order', 'product_to_order.order_id = orders.order_id')->group_by('product_to_order.order_id');
		$this->db->where($where);
		$this->db->where($where2);
		$shipments = $this->db->get();
		return  $shipments->result();
	}

	public function getRecordOrderTicket($user_id) {
		$query = $this->db->query("SELECT ticket_system.ticket_system_id AS ticket_system_id, ticketID, user_id, subject, category_id, priority_id,status, (select date_time_entered from ticket_sytem_log WHERE user_id='".$user_id."' AND ticket_system_id=ticket_system.ticket_system_id ORDER BY date_time_entered DESC LIMIT 1) AS date_time_entered FROM `ticket_system`WHERE user_id='".$user_id."' ORDER BY `ticket_system_id` DESC");
		
		return $query->result_array();
	}

	public function getRecordOrderTicketByAdmin() {
		$query = $this->db->query("SELECT  a.*, b.date_time_entered,c.firstname,c.lastname,c.email FROM ticket_system a INNER JOIN ticket_sytem_log b ON a.ticket_system_id = b.ticket_system_id INNER JOIN user c ON a.user_id = c.id ORDER BY a.ticket_system_id DESC");
		
		return $query->result_array();
	}

	public function truncateTable($table) {
		$this->db->truncate($table);
	}
	
	public function getdayRecord($table, $day, $status, $where) { 
		if($status == 'All') {
			$this->db->select('shipments.*, COUNT(product_to_shipments.product_id) as num_of_pro')->from('shipments')->order_by('shipments.shipment_id', 'desc');
			$this->db->where("created BETWEEN DATE_SUB(NOW(), INTERVAL $day DAY) AND NOW()");
			$this->db->where($where);
			$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id')->group_by('product_to_shipments.shipment_id');
			$res	=	 $this->db->get();
			return  $res->result();
		} else {
			$this->db->select('shipments.*, COUNT(product_to_shipments.product_id) as num_of_pro')->from('shipments')->order_by('shipments.shipment_id', 'desc');
			$this->db->where("created BETWEEN DATE_SUB(NOW(), INTERVAL $day DAY) AND NOW()");
			$this->db->where('status', $status);
			$this->db->where($where);
			$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id')->group_by('product_to_shipments.shipment_id');
			$res	=	 $this->db->get();
			return  $res->result();
		}
	}

	public function getdate_rangeRecord($table, $todate, $fromdate, $status, $where) { 
		if($status=='All') {
			$this->db->select('shipments.*, COUNT(product_to_shipments.product_id) as num_of_pro')->from('shipments')->order_by('shipments.shipment_id', 'desc');
			$this->db->where('created BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');
			$this->db->where($where);
			$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id')->group_by('product_to_shipments.shipment_id');
			$res	=	 $this->db->get();
			return  $res->result();
		} else {
			$this->db->select('shipments.*, COUNT(product_to_shipments.product_id) as num_of_pro')->from('shipments')->order_by('shipments.shipment_id', 'desc');
			$this->db->where('created BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');
			$this->db->where('status', $status);
			$this->db->where($where);
			$this->db->join('product_to_shipments', 'product_to_shipments.shipment_id = shipments.shipment_id')->group_by('product_to_shipments.shipment_id');
			$res	=	 $this->db->get();
			return  $res->result();
		}
		
	}

	/*public function getShipmentsBetweenDates($where, $start_date, $end_date) {
		$this->db->select('*');

		$this->db->from('shipment_received_items');
		$this->db->join('product_to_shipments', 'product_to_shipments.id = shipment_received_items.product_id');
		$this->db->where($where);
		$this->db->where('shipment_received_items.received_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		//$this->db->order_by('shipment_received_items.id', 'DESC');

		$query = $this->db->get();

		return  $query->result();
	}*/

	public function getShipmentsBetweenDates($where, $start_date, $end_date) {
		$this->db->select('*');

		$this->db->from(' transactions');
		$this->db->where($where);
		$this->db->where('transaction_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('transaction_date', 'DESC');

		$query = $this->db->get();

		return  $query->result();
	}

	public function getShipmentsListingBetweenDates($user_id, $start_date, $end_date) {
		$this->db->select('*');

		$this->db->from('shipment_received_items');
		$this->db->join('product_to_shipments', 'product_to_shipments.id = shipment_received_items.product_id');
		$this->db->where('product_to_shipments.user_id', $user_id);
		$this->db->where('shipment_received_items.received_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->group_by('product_to_shipments.shipment_id');
		$this->db->order_by('product_to_shipments.shipment_id', 'DESC');

		$query = $this->db->get();

		return  $query->result();
	}

	public function getShipmentsReceivedListingBetweenDates($shipment_id, $user_id, $start_date, $end_date) {
		$this->db->select('*');

		$this->db->from('shipment_received_items');
		$this->db->join('product_to_shipments', 'product_to_shipments.id = shipment_received_items.product_id');
		$this->db->where('product_to_shipments.user_id', $user_id);
		$this->db->where('product_to_shipments.shipment_id', $shipment_id);
		$this->db->where('shipment_received_items.received_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('shipment_received_items.id', 'DESC');

		$query = $this->db->get();

		return  $query->result();
	}

	public function getShipmentsReceivedDate($table, $where) {
		$this->db->select('*');

		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);

		$query = $this->db->get();

		return  $query->result();
	}

	public function getShipmentsLastReceivedDate($table, $where) {
		$this->db->select('*');

		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		return  $query->result();
	}

	public function countProductUnit($table, $where) {
		$this->db->select('SUM(shipment_quantity) as total');
		$this->db->where($where);
		$res	=	$this->db->get($table);
		return $res->row();
	}

	public function countProductUnitcases($table, $where) {
		$this->db->select('SUM(number_of_cases) as total');
		$this->db->where($where);
		$res	=	$this->db->get($table);
		return $res->row();
	}

	public function getRecordWithJoinOrder($coustomer_id) {
		if($coustomer_id == '') {
			$this->db->select('customer.*, COUNT(orders.sku) as sku, SUM(orders.quantity) as unit')
			 ->from('customer')
			 ->order_by('customer.customer_id', 'desc');

			$this->db->join('orders', 'orders.order_number = customer.order_number')
			 ->group_by('order_number');
			
			$order = $this->db->get();

			return  $order->result();
		} else {
			$this->db->select('*');
			$this->db->from('customer');
			$this->db->join('orders', 'customer.order_number = orders.order_number','left');
			//$this->db->where('orders.order_number');
			//$this->db->group_by('block_out_event_week_day.event_week_day_availability_id');
			//$this->db->order_by('shipments.shipment_id');
			$order = $this->db->get();
			return  $order->result();
		}
	}

	public function insertImages($table, $where, $data) {
		//$this->db->insert($table, $data);
		$insert = $this->db->update("$table", $data, $where);
       // $insert = $this->db->insert($table,$where,$data);
        return $insert?true:false;
    }

	public function getSumOfItem($table, $item_name, $where) {
		$this->db->select("SUM($item_name) as total");
		$this->db->where($where);
		$res	=	$this->db->get($table);
		return $res->row();
	}

	public function getSumOfItemCustom($table, $quantity, $where) {
		$this->db->select("SUM($quantity) as unit,SUM(item_dimension) as totaldimension,SUM(outbound_charge) as totaloutbound");
		$this->db->where($where);
		$res	=	$this->db->get($table);
		return $res->row();
	}
	
	//Function to get records with join
	public function getRecordWithJoinReceivedItem($where=array()) {
		$this->db->select('*');
		$this->db->from('warehouse_shipping_receiving');
		$this->db->join('inventory_data', 'inventory_data.inventory_id = warehouse_shipping_receiving.product_id');
		if(!empty($where)){
			$this->db->where($where);
		}
		//$this->db->where($where);
		//$this->db->group_by('block_out_event_week_day.event_week_day_availability_id');
		$this->db->order_by('warehouse_shipping_receiving.product_id');

		$shipments = $this->db->get();

		return  $shipments->result();
	}
}