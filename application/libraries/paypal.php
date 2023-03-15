<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once(BASEPATH . '../application/libraries/PayPal-PHP-SDK/autoload.php');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Capture;
use PayPal\Api\Authorization;
use PayPal\Api\Amount;
use PayPal\Exception\PayPalConnectionException;

use \PayPal\Api\CreditCard;

use PayPal\Api\CreditCardToken;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;

class Paypal {
	private $debug = false;
	private $sandbox = true;

	private $productionClientID =  "";
	private $productionClientSecret =  "";

	//private $sandboxClientID = "ATDW_RAL1Phyy7yo5wGwr9Q4oaPxMmGhbkLN6HWx25MzILm4kHp_0GnJuyqL";
	//private $sandboxClientSecret = "EOsFkxAKSgqjM5btH4HPjxNvhFD3-dfMs9a8RTSuqfgvDNMDfGUubUc_qj4v";

	private $sandboxClientID = "AZPNx_xlBn72zBE-oxznVuA9qZBWS4n81yfSqq5go9M2hc_qmJh1Zi-nAO_XuUrx34VUQj33rG0FtqQ9";
	private $sandboxClientSecret =  "EGWyppkczrWYO7hHL7c-alI-uq9PaPe7b6Ai0zyZropRezNlRidu3N5F1HemZZdyE9SkLHjpgd7u4LJ8";

	public $apiContext = null;

	public function __construct()
	{
		if($this->sandbox)
		{
			$clientID = $this->sandboxClientID;
			$clientSecret = $this->sandboxClientSecret;
		}
		else
		{
			$clientID = $this->productionClientID;
			$clientSecret = $this->productionClientSecret;
		}

		$this->apiContext = new ApiContext(
			new OAuthTokenCredential(
				$clientID,
				$clientSecret 
			)
		);

		//Setting optional configuration
		$this->apiContext->setConfig(
		  array(
			'mode' => 'sandbox',
			'log.LogEnabled' => true,
			'log.FileName' => 'PayPal.log',
			'log.LogLevel' => 'DEBUG',
			'cache.enabled' => true,
		  )
		);

		//var_dump($this->apiContext);
	}

	public function AddCreditCard($cartType, $cardNumber, $expiryMonth, $expiryYear, $cvv, $firstName, $lastName, $marchantID, $extCardNumber, $extCustomerID) {
		$creditCard = new CreditCard();

		$creditCard->setType("$cartType")
			->setNumber("$cardNumber")
			->setExpireMonth("$expiryMonth")
			->setExpireYear("$expiryYear")
			->setCvv2("$cvv")
			->setFirstName("$firstName")
			->setLastName("$lastName");

		$creditCard->setMerchantId("$marchantID");
		$creditCard->setExternalCardId("$extCardNumber");
		$creditCard->setExternalCustomerId("$extCustomerID");

		//Calling Create CreditCard Method
		try {
			$creditCard->create($this->apiContext);

			//var_dump($creditCard); die;

			//echo $creditCard->getId();

			return 'success####'.$creditCard->getId().'####'.$creditCard->getFirstName().'####'.$creditCard->getLastName().'####'.$creditCard->getType().'####'.$creditCard->getNumber();
		}
		catch (\PayPal\Exception\PayPalConnectionException $ex) {
			$error = json_decode($ex->getData());

			return 'error####'.substr($error->message, 0, 18).'####'.$error->details[0]->issue;
		}
	}

	public function chargePaypalSavedCreditCard($access_token) {
		// ### Credit card token
		// Saved credit card id from a previous call to
		// CreateCreditCard.php
		$creditCardToken = new CreditCardToken();
		$creditCardToken->setCreditCardId($access_token);

		//var_dump($creditCardToken); die;

		// ### FundingInstrument
		// A resource representing a Payer's funding instrument.
		// For stored credit card payments, set the CreditCardToken
		// field on this object.
		$fi = new FundingInstrument();
		$fi->setCreditCardToken($creditCardToken);

		// ### Payer
		// A resource representing a Payer that funds a payment
		// For stored credit card payments, set payment method
		// to 'credit_card'.
		$payer = new Payer();
		$payer->setPaymentMethod("credit_card")
			->setFundingInstruments(array($fi));

		// ### Itemized information
		// (Optional) Lets you specify item wise
		// information
		$item1 = new Item();
		$item1->setName('Ground Coffee 40 oz')
			->setCurrency('USD')
			->setQuantity(1)
			->setPrice(0.5);
		$item2 = new Item();
		$item2->setName('Granola bars')
			->setCurrency('USD')
			->setQuantity(1)
			->setPrice(0.5);

		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));

		// ### Additional payment details
		// Use this optional field to set additional
		// payment information such as tax, shipping
		// charges etc.
		$details = new Details();
		$details->setShipping(0.5)
			->setTax(0.5)
			->setSubtotal(1);

		// ### Amount
		// Lets you specify a payment amount.
		// You can also specify additional details
		// such as shipping, tax.
		$amount = new Amount();
		$amount->setCurrency("USD")
			->setTotal(2)
			->setDetails($details);

		// ### Transaction
		// A transaction defines the contract of a
		// payment - what is the payment for and who
		// is fulfilling it. 
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription("Payment description")
			->setInvoiceNumber(uniqid());

		// ### Payment
		// A Payment Resource; create one using
		// the above types and intent set to 'sale'
		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setTransactions(array($transaction));

		// ###Create Payment
		// Create a payment by calling the 'create' method
		// passing it a valid apiContext.
		// (See bootstrap.php for more on `ApiContext`)
		// The return object contains the state.

		//var_dump($payment);
		try {
			$payment->create($this->apiContext);

			var_dump($payment);
		} catch (Exception $ex) {
			var_dump($ex->getData());
		}

		//return $card;
	}

    public function capture_payment($paymentAmount,$authID,$final=true)
    {
    	$amount = new Amount();
		  $amount->setCurrency("USD");
		  $amount->setTotal(number_format($paymentAmount, 2, '.', ''));

		  $captur = new Capture();
		  $captur->setId($authID);
		  $captur->setAmount($amount);
      $captur->setIsFinalCapture($final);

      $response = new StdClass();
        
      //Catches invalid authIDs and captured authIDs
      try 
      {
        $authorization = Authorization::get($authID, $this->apiContext);
		
        $capt = $authorization->capture($captur, $this->apiContext);

        $response->captureID = $capt->getId();

        $response->responseStatus = true;

        return $response;
      } 
      catch (PayPalConnectionException $ex) 
      {
        if($this->debug)
        {
          $response->exception = $ex;

        }

        $response->responseStatus = false;

        return $response;
      }
    }

}