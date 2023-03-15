<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Sendgrid {
	
	public function sendmail($to, $json_string, $subject, $text, $body, $from){
		
		$ci = get_instance(); // CI_Loader instance
		
		$sendgrid_api_user = $ci->config->item('sendgrid_api_user');
		
		$sendgrid_api_key = $ci->config->item('sendgrid_api_key');
	
		$params = array(
			'api_user'  => $sendgrid_api_user,
			'api_key'   => $sendgrid_api_key,
			'x-smtpapi' => json_encode($json_string),
			'to'        => $to,
			'subject'   => $subject,
			'text'      => $text,
			'html'      => $body,
			'from'      => $from
		);
		
		$request =  'https://api.sendgrid.com/api/mail.send.json';
		
		// Generate curl request
		$session = curl_init($request);
		
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		
		// obtain response
		$response = curl_exec($session);
		curl_close($session);
	}
}
