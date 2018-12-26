<?php
include_once 'dbconnect.php';
session_start();
date_default_timezone_set('Asia/Calcutta'); 
$payid = $_GET["payment_request_id"];
$payment_id = $_GET['payment_id'];
try {
	$ch = curl_init();
	$string = 'https://www.instamojo.com/api/1.1/payments/'.$payment_id.'/';
	curl_setopt($ch, CURLOPT_URL, $string);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
	            array("YOUR API KEY",
	                  "YOUR AUTH TOKEN"));
	
	$response1 = curl_exec($ch);
	curl_close($ch);
	echo ($response1);
    $response = json_decode($response1,true);
   // echo "<pre>";
    //print_r ($response);
    //echo "</pre>";
     echo "<h4>Payment ID: " . $response['payment']['payment_id'] . "</h4>" ;
     echo "<h4>Payment Name: " . $response['payment']['buyer_name'] . "</h4>" ;
     echo "<h4>Payment Email: " . $response['payment']['buyer_email'] . "</h4>" ;
     //echo $_SESSION['validity'];
 //     $tempdate = $_SESSION ['validity'];
 //     if ($_SESSION ['validity'] == 0){
 //         $tempdate = "0000-00-00";
 //         }
 //     $validity = $tempdate;
 //     $Date = date("Y-m-d") ;
 //     $temp = date_diff(date_create(date("Y-m-d")),date_create($tempdate));
 //     if($temp->format("%R%a") <= 0){
	// 	$Date = date("Y-m-d") ;
	// }else{
	// 	$Date = $tempdate;
	// }
 //     //echo($Date);
 //     $recharge;
 //     if($response['payment']['unit_price'] == 100){
 //     	$recharge = '100_rs_recharge';
 //     	$validity = date('Y-m-d', strtotime($Date. ' + 120 days'));
 //     	//echo($validity);
 //     }else if($response['payment']['unit_price'] == 30){
 //     	$recharge = '30_rs_recharge';
 //     	$validity = date('Y-m-d', strtotime($Date. ' + 15 days'));
 //     	//echo($validity);
 //     }else if($response['payment']['unit_price'] == 50){
 //     	$recharge = '50_rs_recharge';
 //     	$validity = date('Y-m-d', strtotime($Date. ' + 30 days'));
 //     	//echo($validity);
 //     }
     //echo($validity);
     $quiz = $_SESSION['quiz'].','.$response['payment']['purpose'];
     if($response['payment']['status'] == 'Credit'){
     	mysqli_query($con,"update users set quiz = '{$quiz}' where id = '{$_SESSION['usr_id']}'");
     	mysqli_query($con,"INSERT into payments(payment_id, user_name, user_email, user_phone,amount, product_name, status) values('{$response['payment']['payment_id']}','{$response['payment']['buyer_name']}','{$response['payment']['buyer_email']}','{$response['payment']['buyer_phone']}','{$response['payment']['unit_price']}','{$response['payment']['purpose']}','{$response['payment']['status']}')");
     	echo('<script>window.location.href = "/payment_successful?payment_id='.$response['payment']['payment_id'].'"</script>');
     }else{
     	echo('<script>window.location.href = "/payment_failed"</script>');
     }
   echo "<pre>";
    print_r($response);
 echo "</pre>";
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>