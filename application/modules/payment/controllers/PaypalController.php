<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class paypalController extends MY_Controller {
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

		$this->data['paypalInfo'] = $this->load->view('ajax/paypal', $this->data['paypalInfoHtml'], true);

		$this->data['paymentform'] = $this->load->view('ajax/paymentform', $this->data, true);

		$this->layout->title('Payment Details | Hubway');

		$this->layout->view('payment', $this->data);
	}

	public function paypal() {
		if($this->input->post()) {
			$PaypalCreditCardInfo = $this->input->post('PaypalCreditCardInfo');

			$cartType = $PaypalCreditCardInfo['type'];
			$cardNumber = $PaypalCreditCardInfo['number'];
			$expiryMonth = $PaypalCreditCardInfo['expirymonth'];
			$expiryYear = $PaypalCreditCardInfo['expiryyear'];
			$cvv = $PaypalCreditCardInfo['cvv'];
			$firstName = $PaypalCreditCardInfo['firstname'];
			$lastName = $PaypalCreditCardInfo['lastname'];

			$marchantID = "MyStore1";
			$extCardNumber = "CardNumber123" . uniqid();
			$extCustomerID = "123123-myUser1@something.com";

			$response = $this->paypal->AddCreditCard($cartType, $cardNumber, $expiryMonth, $expiryYear, $cvv, $firstName, $lastName, $marchantID, $extCardNumber, $extCustomerID);

			//var_dump($response); die;

			$resp = explode('####', $response);

			if(isset($resp[0]) && $resp[0] == 'error') {
				$this->data['error'] = $resp[1].' '.$resp[2];
			}

			if(isset($resp[0]) && $resp[0] == 'success') {
				$this->common->saveRecord('paypal', array('user_id' => $this->session->userdata('user_session')['id'], 'access_token' => $resp[1], 'first_name' => $resp[2], 'last_name' => $resp[3], 'card_type' => $resp[4], 'card_number' => $resp[5]));

				$this->data['success'] = "Your paypal credit card has been validated and saved successfully!";
				$data = "";
				$to 		= $this->session->userdata('user_session')['email'];
				$subject 	= $this->lang->line('Paypal_Credit_Card_Added');
				$message    =  $this->load->view('paypalEmailTemplate',$data, true);
				$headers 	= "MIME-Version: 1.0" . "\r\n"; 
				$headers 	.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers 	.= 'From: Hubway <Hubway@Hubway.com>' . "\r\n";
				$headers 	.= 'Reply-To: Hubway@Hubway.com' . "\r\n";

				mail($to, $subject, $message, $headers);
				$this->session->set_flashdata('success_msg', 'Success! Credit card added successfully.');				
			} else {
				$this->session->set_flashdata('paypal_firstname', $firstName);
				$this->session->set_flashdata('paypal_lastname', $lastName);
				$this->session->set_flashdata('paypal_credit_card_type', $cartType);
				$this->session->set_flashdata('paypal_cc_number', $cardNumber);
				$this->session->set_flashdata('paypal_expiry_month', $expiryMonth);
				$this->session->set_flashdata('paypal_expiry_year', $expiryYear);
				$this->session->set_flashdata('paypal_cvv', $cvv);
				
				$this->session->set_flashdata('error_msg', 'Failure! Unable to add credit card details. Error Message : ' . $this->data['error']);
			}
			echo 1;
		}
	}

	public function chargePaypalSavedCreditCard() {
		$get_user_credit_card_details = $this->common->getRecord('paypal', array('user_id' => $this->session->userdata('user_session')['id']));

		//echo "<pre>"; print_r($get_user_credit_card_details); die;

		$access_token = $get_user_credit_card_details[0]->access_token;

		//echo $access_token;

		$response = $this->paypal->chargePaypalSavedCreditCard($access_token);

		//echo "<pre>"; print_r($response);
	}
}

/* End of file payment.php */
/* Location: ./application/controllers/payment.php */