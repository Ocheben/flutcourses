<?php
session_start();
$_SESSION["name"] = $_POST['name'];
$_SESSION["email"] = $_POST['email'];
$_SESSION["course"] = $_POST['course'];

$curl = curl_init();

$customer_email = $_POST['email'];
$amount = 5000;  
$currency = "NGN";
$txref = md5(uniqid(rand(), true)); // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK-7e6dd33bff4a303d3c2b30ddb2c8bc4d-X"; // get your public key from the dashboard.
$redirect_url = "https://ocheben.com/courses/flutter/redirect.php";
//$payment_plan = "pass the plan id"  this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
    'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);