<?php

class apiController extends baseController {

  public function payment($params) {
    $error = '';
    $payment_id = $params[3];
    $app_id = $params[4];
    $user_id = $params[5];

    $url = PartuzaConfig::get('gadget_server') . "/social/rest/payment/@self/@self/@app/" . $app_id;

    $this->template('api/payment.php', array('payment_id'=>$payment_id
			, 'user_id'=>$user_id
			//, 'app_id'=>$app_id
			, 'url'=>$url
			, 'error' => $error));
  }

  public function coin($params) {
    $user_id = $params[3];
    echo 'Nap tien nao :D - UserID:' . $user_id;
  }

  public function people($params) {
    $error = '';
    $success = 'true';
    $src = '/img/1.jpg';

    $entry = array('profileUrl'=>$src
			, 'id'=>$params[3]
			, 'nickname'=>$params[4] );

    echo json_encode( array('is_success'=>$success	
			, 'entry'=>$entry
			, 'error'=>$error ) );
  }

  public function avatar($params) {
    $error = '';
    $success = 'true';
    $src = '/img/1.jpg';

    echo json_encode( array('is_success'=>$success
			, 'thumbnailUrl'=>$src
			, 'request'=>$params
			, 'id'=>$params[3]
			, 'self'=>$params[4]
			, 'error'=>$error ) );
  }
}
