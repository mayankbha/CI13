<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amazon extends MY_Controller {	
	
	public $data = '';
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
		
	}

	public function index() {		
		$config 					= 					$this->common->getSingleRecord('config');
		$data['credentials']		=					$config;
		$this->layout->title('Amazon | Hubway');
		$this->layout->view('amazon', $data);
	}
	
	public function validatAmazon() {	
		if($this->input->post('access_key')){
			$post		=	array(	
										'user_id'=>$this->session->userdata("user_session")["id"],
										'username'=>$this->session->userdata("user_session")["firstname"],
										'access_key'=>$this->input->post('access_key'), 	
										'secret_access_key'=>$this->input->post('secret_access_key'), 	
										//'application_name'=>$this->input->post('application_name'), 	
										//'application_version'=>$this->input->post('application_version'), 	
										'merchant_id'=>$this->input->post('merchant_id'), 	
										'marketplace_id'=>$this->input->post('marketplace_id'),
										'status' => 'validate',
										'php_master' => true										
								);
								
			$ch = curl_init();
		
			curl_setopt($ch, CURLOPT_URL,"http://hubway.upworkdevelopers.com/MarketplaceWebService/Samples/GetReportSample.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 1000); //timeout in seconds
			$server_output = curl_exec ($ch);
			
			if($server_output==1){
				$data				=	array(	
											'user_id'=>$this->session->userdata("user_session")["id"],
											'access_key'=>$this->input->post('access_key'), 	
											'secret_access_key'=>$this->input->post('secret_access_key'), 	
											//'application_name'=>$this->input->post('application_name'), 
											//'application_version'=>$this->input->post('application_version'),
											'merchant_id'=>$this->input->post('merchant_id'), 	
											'marketplace_id'=>$this->input->post('marketplace_id'),						
										);	
				$lastInsertid 		= 		$this->common->saveRecord('config', $data);
			}else{
				echo $server_output;
			}
			curl_close ($ch);
			}
				
	}
	
	public function validatAmazonAdvertisement(){
		if($this->input->post('p_a_access_key')){
			$p_a_access_key					=		$this->input->post('p_a_access_key');
			$p_a_secret_access_key			=		$this->input->post('p_a_secret_access_key');
			
			
			// Your AWS Access Key ID, as taken from the AWS Your Account page
			$aws_access_key_id = $p_a_access_key;

			// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
			$aws_secret_key = $p_a_secret_access_key;

			// The region you are interested in
			$endpoint = "webservices.amazon.com";

			$uri = "/onca/xml";

			$params = array(
				"Service" => "AWSECommerceService",
				"Operation" => "ItemSearch",
				"AWSAccessKeyId" => $p_a_access_key,
				"AssociateTag" => "hg",
				"SearchIndex" => "All",
				"Keywords" => "A",
				"ResponseGroup" => "Images,ItemAttributes,Offers"
			);

			// Set current timestamp if not set
			if (!isset($params["Timestamp"])) {
				$params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
			}

			// Sort the parameters by key
			ksort($params);

			$pairs = array();

			foreach ($params as $key => $value) {
				array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
			}

			// Generate the canonical query
			$canonical_query_string = join("&", $pairs);

			// Generate the string to be signed
			$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

			// Generate the signature required by the Product Advertising API
			$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));

			// Generate the signed URL
			$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

			//echo "Signed URL: \"".$request_url."\"";
			try {
				
					$xml = @file_get_contents($request_url, true);
				
				
					$xml1 = new SimpleXMLElement($xml);		
					if(isset($xml1->Items->TotalResults)){
						$data				=	array(	
												'user_id'=>$this->session->userdata("user_session")["id"],
												'advertisement_access_key'=>$this->input->post('p_a_access_key'), 	
												'advertisement_secret_access_key'=>$this->input->post('p_a_secret_access_key')			
											);							
						$lastInsertid 		= 		$this->common->saveRecord('config_advertisement', $data);
						echo 'validate';
					}
				
			}catch(Exception $e) {
				echo 'Message: ' .$e->getMessage();
			}
			//echo '<pre>'; print_r($xml1->Items->TotalResults);
		}else{
			
		}
	}

	
	public function deleteAccount(){
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$value = $this->input->post('value');
		$response = $this->common->deleteRecord($table, $column, $value);
		if($response){
			$inventoryData 					= 		$this->common->truncateTable('inventory_data');
			echo $response;
		}
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */