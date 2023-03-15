<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InventoryController extends MY_Controller {
	public $data = null;

	public function __construct() { 
		parent::__construct();

		if(!$this->session->userdata('user_session'))
			redirect( base_url(), 'refresh');

		$this->load->model('common_model', 'common'); /* LOADING MODEL */
	
	}


	public function inventoryView(){
		$where							=		array('quantity >'=>0);
		$inventoryData 					= 		$this->common->getRecord('inventory_data',$where);
		$data['products']				=		$inventoryData;
		$this->layout->title('View Inventory | Hubway');
		$this->layout->view('inventoryView', $data);
	}
	
	public function sellingProduct(){
		$inventoryData 					= 		$this->common->getRecord('inventory_data');
		$data['products']				=		$inventoryData;
		$this->layout->title('View Inventory | Hubway');
		$this->layout->view('productSelling', $data);	
	}

	public function updateInventoryCost(){
		if($this->input->post('updateInventoryCost')){
			$where							=		array('inventory_id'=>$this->input->post('inventory_id'));
			$data							=		array('cost'=>$this->input->post('cost'));
			$lastInsertid 					= 		$this->common->updateRecord('inventory_data', $data, $where);
			if($lastInsertid){
				echo 'updated';
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
	}

	public function updateInventoryQuantity(){
		if($this->input->post('updateInventoryQuantity')){
			$where							=		array('inventory_id'=>$this->input->post('inventory_id'));
			$data							=		array('quantity'=>$this->input->post('quantity'));
			$lastInsertid 					= 		$this->common->updateRecord('inventory_data', $data, $where);
			if($lastInsertid){
				echo 'updated';
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
	}

	public function changeCondition(){
		if($this->input->post('changeCondition')){
			$where							=		array('inventory_id'=>$this->input->post('inventory_id'));
			$data							=		array('condition'=>$this->input->post('item_condition'));
			$lastInsertid 					= 		$this->common->updateRecord('inventory_data', $data, $where);
			if($lastInsertid){
				echo 'updated';
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
	}
	
	public function synData(){
		
		$amezonCredentials				= 		$this->common->getSingleRecord('config', array('user_id'=>$this->session->userdata("user_session")["id"]));
		
		$post = array(
			'username'=>$this->session->userdata("user_session")["firstname"],
			'access_key'=>$amezonCredentials->access_key,
			'secret_access_key'=>$amezonCredentials->secret_access_key,
			'application_name'=>$amezonCredentials->application_name,
			'application_version'=>$amezonCredentials->application_version,
			'merchant_id'=>$amezonCredentials->merchant_id,
			'marketplace_id'=>$amezonCredentials->marketplace_id,
			'status' => 'synData',
			'php_master' => true
		);
		
		$inventoryData 					= 		$this->common->getRecord('inventory_data');
		if(!empty($inventoryData)){
			$asin	=	array();
			foreach ($inventoryData as $row) {
				$asin[]	=	$row->asin1;
			}
		}else{
			$asin	='';
		}
		
		

		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL,"http://hubway.upworkdevelopers.com/MarketplaceWebService/Samples/GetReportSample.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post);

		// in real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//          http_build_query(array('postvar1' => 'value1')));

		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10000); //timeout in seconds
		$server_output = curl_exec ($ch);
		$data	= json_decode($server_output, true);

		if($data!=''){
			$this->updateInventory($data, $post, $asin);
		}
		curl_close ($ch);

		// further processing ....
	}

	public function updateInventory($array='', $post, $asin){
		if(!empty($array)){
			foreach ($array as $row) {
				$data	=							array(
														'merchant_SKU'=>$row['seller-sku'], 
														'listing_id'=>$row['listing-id'], 
														'title'=>$row['item-name'], 
														'quantity'=>$row['quantity'], 
														'price'=>$row['price'], 
														'item_description'=>$row['item-description'],
														'asin1'=>$row['asin1'],
														'asin2'=>$row['asin2'],
														'asin3'=>$row['asin3']
													);	
				if($asin!=''){
					if (in_array($row['asin1'], $asin)) {
					}else{
						$lastInsertid 					= 		$this->common->saveRecord('inventory_data', $data);
					}
				}else{
					$lastInsertid 					= 		$this->common->saveRecord('inventory_data', $data);
				}
			}
		}
	}

	public function updateItems1(){
		$amezonCredentials				= 		$this->common->getSingleRecord('config', array('user_id'=>$this->session->userdata("user_session")["id"]));
		
		$post = array(
			'username'=>$this->session->userdata("user_session")["firstname"],
			'access_key'=>$amezonCredentials->access_key,
			'secret_access_key'=>$amezonCredentials->secret_access_key,
			'application_name'=>$amezonCredentials->application_name,
			'application_version'=>$amezonCredentials->application_version,
			'merchant_id'=>$amezonCredentials->merchant_id,
			'marketplace_id'=>$amezonCredentials->marketplace_id,
			'status' => 'synData',
			'php_master' => true
		);
		$where								=		array('EAN'=>NULL);
		$inventoryDetails 					= 		$this->common->getRecord('inventory_data');

		$asinsnotFound 						= 		array("B000270XNK", "B00383B1EU", "B001GAQ7MI", "B000270XNK", "B001GAQ7MI");
		
		foreach ($inventoryDetails as $row){
			if (in_array($row->asin1, $asinsnotFound)){
				
			}else{
				if($row->EAN==''){ 
					$this->updateItems( $row->asin1, $post);	
				}
			}
			
		}

		$inventoryDetails 					= 		$this->common->getRecord('inventory_data');
		if(!empty($inventoryDetails)){
			if (in_array($row->asin1, $asinsnotFound)){
				
			}else{
				if($row->EAN==''){ 
					$this->updateItems( $row->asin1, $post);	
				}
			}
		}else{
			echo "success";
		}
	}

	public function updateItems($asin, $post){ 
					
					
			// Your AWS Access Key ID, as taken from the AWS Your Account page
			$aws_access_key_id = 'AKIAJ2WHY3JQI6XMUPXA';

			// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
			$aws_secret_key = '41YCzo1E26nqSLpIBmMZIgRdCVesy0Gzvu1lPGqc';

			// The region you are interested in
			$endpoint = "webservices.amazon.com";

			$uri = "/onca/xml";

			$params = array(
				"Service" => "AWSECommerceService",
				"Operation" => "ItemLookup",
				"AWSAccessKeyId" => 'AKIAJ2WHY3JQI6XMUPXA',
				"AssociateTag" => $post['merchant_id'],
				"ItemId" => $asin,
				"IdType" => 'ASIN',
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
		try {
			// Generate the signed URL
			$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

			//echo $request_url;

			//echo "Signed URL: \"".$request_url."\"";
			//$data		=	 	  file_get_contents($request_url);
			
			$xml = file_get_contents($request_url, true);
			sleep(1);
			//echo $xml;

					
			// SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
			//$xml = preg_replace(“/(<\/?)(\w+):([^>]*>)/”, “$1$2$3″, $xml);

			$xml1 = new SimpleXMLElement($xml);

			//echo "<pre>"; print_r($xml1->Items->Item->ItemAttributes);
			if(isset($xml1->Items->Item->ItemAttributes->EAN)){
				
				$updateID = array(
					'asin1'=>$asin
				);
				
				if($xml1->Items->Item->ItemAttributes->ItemDimensions->Height) {
					foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Height[0]->attributes() as $a => $b) {
						$height_unit = $b;
					}
				} else {
					$height_unit = null;
				}

				if($xml1->Items->Item->ItemAttributes->ItemDimensions->Length) {
					foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Length[0]->attributes() as $a => $b) {
						$length_unit = $b;
					}
				} else {
					$length_unit = null;
				}

				if($xml1->Items->Item->ItemAttributes->ItemDimensions->Weight) {
					foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Weight[0]->attributes() as $a => $b) {
						$weight_unit = $b;
					}
				} else {
					if($xml1->Items->Item->ItemAttributes->PackageDimensions->Weight) {
						foreach($xml1->Items->Item->ItemAttributes->PackageDimensions->Weight[0]->attributes() as $a => $b) {
							$weight_unit = $b;
						}
					} else {
						$weight_unit = null;
					}
				}

				if($xml1->Items->Item->ItemAttributes->ItemDimensions->Width) {
					foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Width[0]->attributes() as $a => $b) {
						$width_unit = $b;
					}
				} else {
					$weight_unit = null;
				}

				$item_Height		=	$xml1->Items->Item->ItemAttributes->ItemDimensions->Height/100;
				$item_Length		=	$xml1->Items->Item->ItemAttributes->ItemDimensions->Length/100;
				$item_Width			=	$xml1->Items->Item->ItemAttributes->ItemDimensions->Width/100;

				$cubic_feet			=	$item_Height*$item_Length*$item_Width;


				$itemDeteails		=		array('item_image_url'=>addslashes($xml1->Items->Item->SmallImage->URL),'EAN'=>addslashes($xml1->Items->Item->ItemAttributes->EAN),'UPC'=>addslashes($xml1->Items->Item->ItemAttributes->UPC),'height_unit'=>"$height_unit",'length_unit'=>"$length_unit",'weight_unit'=>"$weight_unit",'width_unit'=>"$width_unit",'Height'=>addslashes($xml1->Items->Item->ItemAttributes->ItemDimensions->Height/100),'Length'=>addslashes($xml1->Items->Item->ItemAttributes->ItemDimensions->Length/100),'Weight'=>addslashes($xml1->Items->Item->ItemAttributes->ItemDimensions->Weight/100),'Width'=>addslashes($xml1->Items->Item->ItemAttributes->ItemDimensions->Width/100),'cubic_feet'=>$cubic_feet, 'details'=>$xml);

				$lastInsertid = $this->common->updateRecord('inventory_data', $itemDeteails, $updateID);
			}
		}catch(Exception $e) {
			echo 'Message: ' .$e->getMessage();
		}
	}
}	