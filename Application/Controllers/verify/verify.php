<?php

class verifyController extends baseController {

  public function verifyReceipt($params) {
  
	$myreceipt = json_encode(array('receipt-data' => $_GET['receipt']));
	$url = "https://sandbox.itunes.apple.com/verifyReceipt";

	//create cURL Request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $myreceipt);

	//execute cURL Request
	$response = curl_exec($ch);
	$errno = curl_errno($ch);
	$errmsg = curl_error($ch);
	curl_close($ch);

	$response_json = json_decode($response);

	//var_dump($response_json);
	print $response_json->{'status'};
	//print $response;
   
  }
}
