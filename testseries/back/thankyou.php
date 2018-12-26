<?php
include 'instamojo.php';
$api = new Instamojo\Instamojo('8aad5fa6fe0930b0b653a36b7f458c8a', 'cb9ad91b6ce155166da35ad15d1c537b','https://www.instamojo.com/api/1.1/payment-requests/');
$payid = $_GET["payment_request_id"];
try {
    $response = $api->paymentRequestStatus($payid);
//     echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
//     echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
//     echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
//   echo "<pre>";
//    print_r($response);
// echo "</pre>";
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>