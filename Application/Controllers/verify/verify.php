<?php

class verifyController extends baseController {

  public function verifyReceipt($params) {
  	
	$payment_id = $params[3];
	$app_id = $params[4];
    	$user_id = $params[5];
	$product_id = $_GET['productId'];
	
	// create transaction save to db
	$payment = $this->model('payment');        
	$id = $payment->create_transaction($user_id, $app_id, $payment_id, $product_id, $_GET['receipt']);

	$myreceipt = json_encode(array('receipt-data' => $_GET['receipt']));
	$url = "https://buy.itunes.apple.com/verifyReceipt";
	$isSandbox = true;
	if ($isSandbox) {
            $url = 'https://sandbox.itunes.apple.com/verifyReceipt';
        }

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

	$fp = fopen("/tmp/partuza_log.txt", "a");
	fwrite($fp, $response);
	fwrite($fp, " ------- Id: " . $id);
	fclose($fp);

	if($response_json->{'status'} == "0") {
		if(trim($response_json->{'receipt'}->{'product_id'}) == $product_id && $response_json->{'receipt'}->{'original_transaction_id'} == $response_json->{'receipt'}->{'transaction_id'} && $response_json->{'receipt'}->{'bid'} == "com.aoi-socialapp.military2-ios") {
			// update transaction is verify successful
			$payment->update_transaction($id, 'checked', $response_json->{'receipt'}->{'transaction_id'});	
			print $response_json->{'status'};
		}
		else {
			// update transaction invalid
			$payment->update_transaction($id, 'fail', '');
			print "-1";
		}
	}
	//print $id;
	//var_dump($response_json);
	//print $response;   	
  }
}
