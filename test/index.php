<?php

// Your AWS Access Key ID, as taken from the AWS Your Account page
$aws_access_key_id = "AKIAJ2WHY3JQI6XMUPXA";

// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
$aws_secret_key = "41YCzo1E26nqSLpIBmMZIgRdCVesy0Gzvu1lPGqc";

// The region you are interested in
$endpoint = "webservices.amazon.com";

$uri = "/onca/xml";

$params = array(
    "Service" => "AWSECommerceService",
    "Operation" => "ItemLookup",
    "AWSAccessKeyId" => "AKIAJ2WHY3JQI6XMUPXA",
    "AssociateTag" => "B007TUWEEO",
	"ItemId" => 'B002LGMIWE',
	"IdType" => 'ASIN',
    "ResponseGroup" => "ItemAttributes,ItemIds,Offers,Reviews"
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

//echo $request_url;

//echo "Signed URL: \"".$request_url."\"";
//$data		=	 	  file_get_contents($request_url);

$xml = file_get_contents($request_url, true);

//echo $xml;

		
// SimpleXML seems to have problems with the colon ":" in the <xxx:yyy> response tags, so take them out
//$xml = preg_replace(“/(<\/?)(\w+):([^>]*>)/”, “$1$2$3″, $xml);

$xml1 = new SimpleXMLElement($xml);
//if($xml1->Request){
	//echo 'yes';
//}else{
	//echo 'no';
//}

echo "<pre>"; print_r($xml1->Items);

//echo "<pre>"; print_r($xml1->Items->Item->ItemAttributes->ItemDimensions[0]);

//var_dump((string) $xml1->Items->Item->ItemAttributes->ItemDimensions->Height[0]);

foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Length[0]->attributes() as $a => $b) {
	//echo $a,'="',$b,"\"\n";

	echo $b.'<br><br>';
}

foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Width[0]->attributes() as $a => $b) {
	//echo $a,'="',$b,"\"\n";

	echo $b.'<br><br>';
}

foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Height[0]->attributes() as $a => $b) {
	//echo $a,'="',$b,"\"\n";

	echo $b.'<br><br>';
}

foreach($xml1->Items->Item->ItemAttributes->ItemDimensions->Weight[0]->attributes() as $a => $b) {
	//echo $a,'="',$b,"\"\n";

	echo $b.'<br><br>';
}

//$data		=	$xml1->Items->Item->ItemAttributes;



//echo $xml1->Items->Item->ItemAttributes->EAN;
//echo $xml1->Items->Item->ItemAttributes->UPC;
//foreach($data as $header) { print_r($data); 
   //echo $header['EAN'];
//}

?>
