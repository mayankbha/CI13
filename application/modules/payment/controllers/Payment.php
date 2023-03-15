<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MY_Controller {
	public $data = null;

	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */

		//Calling Paypal Library
		$this->load->library('paypal');

		//Calling cURL Library
		$this->load->library('curl');

		//Calling Email Library
		$this->load->library('email');
	}

	public function index() {
		
		$paypalInfoCount = $this->common->getRecordCount('paypal', array('user_id' => $this->session->userdata('user_session')['id']));

		if($paypalInfoCount > 0) {
			$this->data['paypalInfoHtml'] = $this->common->getSingleRecord('paypal', array('user_id' => $this->session->userdata('user_session')['id']));
		} else {
			$this->data['paypalInfoHtml'] = '';
		}

		$alipayInfoCount = $this->common->getRecordCount('alipay', array('user_id' =>$this->session->userdata('user_session')['id']));

		if($alipayInfoCount > 0) {
			$this->data['alipayInfoHtml'] = $this->common->getSingleRecord('alipay', array('user_id' => $this->session->userdata('user_session')['id']));
		} else {
			$this->data['alipayInfoHtml'] = '';
		}

		$this->data['paypalInfo'] = $this->load->view('ajax/paypal', $this->data['paypalInfoHtml'], true);

		$this->data['alipayInfo'] = $this->load->view('ajax/alipay', $this->data['alipayInfoHtml'], true);

		$this->data['paymentform'] = $this->load->view('ajax/paymentform', $this->data, true);

		$this->layout->title('Payment Details | Hubway');

		$this->layout->view('payment', $this->data);
	}

	public function deleteRecord() { 
	
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$value = $this->input->post('value');

		$response = $this->common->deleteRecord($table, $column, $value);

		echo $response;
	}
	
}

/* End of file payment.php */
/* Location: ./application/controllers/payment.php */