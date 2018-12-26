<?php
session_start();
if(!isset($_SESSION['usr_id'])){
	header('Location: /login');
}
//header('Location: www.google.com');
$plans = $_POST['plans'];
$price = $_POST['price'];
$product_name = '';
$price = '';
for($i = 0; $i < sizeof($plans); $i ++){
    if($i != sizeof($plans) - 1){
        $product_name .= $plans[$i] . ',';
    }else{
        $product_name .= $plans[$i];
    }
    $price += $price[$i];
}

$name = $_SESSION['usr_name'];
$phone = $_SESSION["mobile"];
$email = $_SESSION["usr_email"];
$ch = curl_init();
try{
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("YOUR API KEY",
                  "YOUR AUTH TOKEN"));
$payload = Array(
    'purpose' => $product_name,
    'amount' => $price,
    'phone' => $phone,
    'buyer_name' => $name,
    'redirect_url' => '/back/thankyou.php',
    'send_email' => false,
    'webhook' => '/back/webhook.php',
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

//echo $response;
$data = json_decode($response,true);
$pay_url = $data['payment_request']['longurl'];
//echo "<pre>";
//print_r($data);
//echo "</pre>";
echo('<script>window.location.href = "'.$pay_url.'"</script>');
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
  ?>