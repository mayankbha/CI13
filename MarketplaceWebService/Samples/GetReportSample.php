<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     MarketplaceWebService
 *  @copyright   Copyright 2009 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2009-01-01
 */
/******************************************************************************* 

 *  Marketplace Web Service PHP5 Library
 *  Generated: Thu May 07 13:07:36 PDT 2009
 * 
 */

/**
 * Get Report  Sample
 */
//if(isset($_REQUEST) or !empty($_REQUEST)){
	//print_r($_REQUEST); 
//}
if($_POST['php_master']==1){
	$user_name				=			$_POST['username'];
	$status					=			$_POST['status'];
	define('AWS_ACCESS_KEY_ID', 		$_POST['access_key']);
    define('AWS_SECRET_ACCESS_KEY', 	$_POST['secret_access_key']);
	
	
	//define('APPLICATION_NAME', 			$_POST['application_name']);
    //define('APPLICATION_VERSION', 		$_POST['application_version']);
	
	define ('MERCHANT_ID', 				$_POST['merchant_id']);
    define ('MARKETPLACE_ID', 			$_POST['marketplace_id']);
    //define ('MWSAuthToken', 			$_POST['auth_token']);
	
}
/*
//include_once ('.config.inc.php'); 
	define('AWS_ACCESS_KEY_ID', 'AKIAJNFWMKCJAHBEOUWA');
    define('AWS_SECRET_ACCESS_KEY', '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');workglovesdepot(WGD)

   /************************************************************************
    * REQUIRED
    *
    * All MWS requests must contain a User-Agent header. The application
    * name and version defined below are used in creating this value.
    ***********************************************************************/
   /* define('APPLICATION_NAME', 'workglovesdepot(WGD)');
    define('APPLICATION_VERSION', 'workglovesdepot1.1');

   /************************************************************************
    * REQUIRED
    *
    * All MWS requests must contain the seller's merchant ID and
    * marketplace ID.
    ***********************************************************************/
   /* define ('MERCHANT_ID', 'AE3L8DO5YKOR4');
    define ('MARKETPLACE_ID', 'ATVPDKIKX0DER');
    define ('MWSAuthToken', 'amzn.mws.a4a821ce­29cb­9700­1244­0bdca6bf217a');
	
	*/
	
	
	set_include_path(get_include_path() . PATH_SEPARATOR . '../../.');
	function __autoload($className){
        $filePath = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $includePaths = explode(PATH_SEPARATOR, get_include_path());
        foreach($includePaths as $includePath){
            if(file_exists($includePath . DIRECTORY_SEPARATOR . $filePath)){
                require_once $filePath;
                return;
            }
        }
    }
	
/************************************************************************
* Uncomment to configure the client instance. Configuration settings
* are:
*
* - MWS endpoint URL
* - Proxy host and port.
* - MaxErrorRetry.
***********************************************************************/
// IMPORTANT: Uncomment the approiate line for the country you wish to
// sell in:
// United States:

$serviceUrl = "https://mws.amazonservices.com";
// United Kingdom
//$serviceUrl = "https://mws.amazonservices.co.uk";
// Germany
//$serviceUrl = "https://mws.amazonservices.de";
// France
//$serviceUrl = "https://mws.amazonservices.fr";
// Italy
//$serviceUrl = "https://mws.amazonservices.it";
// Japan
//$serviceUrl = "https://mws.amazonservices.jp";
// China
//$serviceUrl = "https://mws.amazonservices.com.cn";
// Canada
//$serviceUrl = "https://mws.amazonservices.ca";
// India
//$serviceUrl = "https://mws.amazonservices.in";

$config = array (
  'ServiceURL' => $serviceUrl,
  'ProxyHost' => null,
  'ProxyPort' => -1,
  'MaxErrorRetry' => 3,
);

/************************************************************************
 * Instantiate Implementation of MarketplaceWebService
 * 
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants 
 * are defined in the .config.inc.php located in the same 
 * directory as this sample
 ***********************************************************************/

 $service = new MarketplaceWebService_Client(
     AWS_ACCESS_KEY_ID, 
     AWS_SECRET_ACCESS_KEY, 
     $config,
     APPLICATION_NAME,
     APPLICATION_VERSION);



/************************************************************************
 * Uncomment to try out Mock Service that simulates MarketplaceWebService
 * responses without calling MarketplaceWebService service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under MarketplaceWebService/Mock tree
 *
 ***********************************************************************/
 // $service = new MarketplaceWebService_Mock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out 
 * sample for Get Report Action
 ***********************************************************************/
 // @TODO: set request. Action can be passed as MarketplaceWebService_Model_GetReportRequest
 // object or array of parameters
 $reportId = '4912065460017280';
 
// $parameters = array (
//   'Merchant' => MERCHANT_ID,
//   'Report' => @fopen('php://memory', 'rw+'),
//   'ReportId' => $reportId,
//   'MWSAuthToken' => '<MWS Auth Token>', // Optional
// );
// $request = new MarketplaceWebService_Model_GetReportRequest($parameters);

$request = new MarketplaceWebService_Model_GetReportRequest();
$request->setMerchant(MERCHANT_ID);


$request->setReport(@fopen('php://memory', 'rw+'));
$request->setReportId($reportId);
//$request->setMWSAuthToken('<MWS Auth Token>'); // Optional
 
invokeGetReport($service, $request, $status);

/**
  * Get Report Action Sample
  * The GetReport operation returns the contents of a report. Reports can potentially be
  * very large (>100MB) which is why we only return one report at a time, and in a
  * streaming fashion.
  *   
  * @param MarketplaceWebService_Interface $service instance of MarketplaceWebService_Interface
  * @param mixed $request MarketplaceWebService_Model_GetReport or array of parameters
  */
  function invokeGetReport(MarketplaceWebService_Interface $service, $request, $status) 
  {
      try {
              $response = $service->getReport($request);
              
                //echo ("Service Response\n");
                //echo ("=============================================================================\n");

                //echo("        GetReportResponse\n");
                if ($response->isSetGetReportResult()) {
                  $getReportResult = $response->getGetReportResult(); 
                  //echo ("            GetReport");
                  
                  if ($getReportResult->isSetContentMd5()) {
                    //echo ("                ContentMd5");
                    //echo ("                " . $getReportResult->getContentMd5() . "\n");
                  }
                }
                if ($response->isSetResponseMetadata()) { 
                    //echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        //echo("                RequestId\n");
                        //echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                }
				
                //echo ("        Report Contents\n");
                $content = stream_get_contents($request->getReport());

				
				if($status	!= 'validate'){ 
					$counter=0;
					
					//print_r($content); die;
					
					$myfile = fopen("$user_name.txt", "w") or die("Unable to open file!");
					fwrite($myfile, $content);
					fclose($myfile);
					
					$mainarray = array(); 
					//echo "<table width=1050 border=1><tr style='background-color:lightgrey;'><td>S.no</td><td>item-name</td><td>listing-id</td><td>seller-sku</td><td>price</td><td>quantity</td></tr>";
					$counter=0;
					foreach (file("$user_name.txt") as $row) { 
						if($counter==0){$counter++;continue;}
					  $ar = explode("\t", $row); 
					  $mainarray[] = array('item-name' => htmlentities($ar[0]), 'item-description' => htmlentities($ar[1]), 'listing-id' => $ar[2], 'seller-sku' => $ar[3], 'price' => $ar[4], 'quantity' => $ar[5] ,'item-condition' => $ar[13],'asin1' => $ar[16],'asin2' => $ar[17],'asin3' => $ar[18]); 
					  if($counter%2!=0){
					 // echo "<tr style='background-color:lightgrey;'><td>".$counter."</td><td>".$ar[0]."</td><td>".$ar[2]."</td><td>".$ar[3]."</td><td>$".$ar[4]."</td><td>".$ar[5]."</td></tr>";
					  }else{
					  //echo "<tr><td>".$counter."</td><td>".$ar[0]."</td><td>".$ar[2]."</td><td>".$ar[3]."</td><td>$".$ar[4]."</td><td>".$ar[5]."</td></tr>";
					  }
					$counter++;
					} 
					
					$ResponseHeaderMetadata						=		$response->getResponseHeaderMetadata();
					
					$mainarray[]['success']		=		1;
				}
				//echo "</table>";
				if($status=='validate'){
					echo 1;
				}else{
					echo json_encode($mainarray);
				}
				
				//print_r($mainarray); die;
                //echo("  ResponseHeaderMetadata          : " . $response->getResponseHeaderMetadata(). "\n");
     } catch (MarketplaceWebService_Exception $ex) {
		 if($status=='validate'){
			echo $error		=	$ex->getErrorCode();
		 }else{
			$error			=		0;
			echo json_encode($error);
		 }
		
         //echo("Caught Exception: " . $ex->getMessage() . "\n");
        // echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         //echo("Error Code: " . $ex->getErrorCode() . "\n");
         //echo("Error Type: " . $ex->getErrorType() . "\n");
        // echo("Request ID: " . $ex->getRequestId() . "\n");
        // echo("XML: " . $ex->getXML() . "\n");
         //echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
 }
                                                                                
