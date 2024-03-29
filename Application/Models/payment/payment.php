<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class paymentModel extends Model {

  public function update_coin($userId, $appId, $coin) {
    global $db;
    $userId = $db->addslashes($userId);
    $appId = $db->addslashes($appId);
    $coin = $db->addslashes($coin);

    $res = $db->query( "select * from person_coins where person_id = '$userId' and app_id = '$appId'");
    if ($res && $db->num_rows($res) > 0) {
	while ($row = $db->fetch_array($res, MYSQLI_ASSOC)) {
          $current_coin = $row['coin'];        
	}
	$coin = $current_coin + $coin;

        $query = "update person_coins set coin = '$coin' where person_id = '$userId' and app_id = '$appId'";
	if (! $db->query($query)) {
	  //throw new SocialSpiException("Update coin failed.", ResponseError::$INTERNAL_ERROR);
    	  return false;
	}
    }
    else {
	$query = "insert into person_coins (person_id, app_id, coin)" . " values ('$userId', '$appId', '$coin')";
	$id = $db->query($query);
    }
    return true;

  }

  public function create_transaction($userId, $appId, $paymentId, $productId, $receipt) {
    global $db;
    $userId = $db->addslashes($userId);
    $appId = $db->addslashes($appId);
    $paymentId = $db->addslashes($paymentId);

    $now = date('Y-m-d H:i:s');

    $query = $db->query("insert into person_transactions (person_id, app_id, payment_id, product_id, receipt, status, created_date )" . " values ('$userId', '$appId', '$paymentId', '$productId', '$receipt', 'created', '$now')");
    $id =  $db->insert_id($query);
    
    return $id;

  }

  public function update_transaction($id, $status, $transactionId) {
    global $db;
    $id = $db->addslashes($id);
    $transactionId = $db->addslashes($transactionId);

    $now = date('Y-m-d H:i:s');

    $query = "update person_transactions set transaction_id = '$transactionId', status = '$status', verified_date = '$now' where id = '$id'";
    if (! $db->query($query)) {	
    	return false;
    }
    return true;
  }
}
