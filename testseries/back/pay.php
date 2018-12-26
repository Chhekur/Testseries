<?php 
$product_name = $_POST["product_name"];
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
//echo('before');
include_once 'instamojo.php';
//echo('after');
$api = new Instamojo\Instamojo('8aad5fa6fe0930b0b653a36b7f458c8a', 'cb9ad91b6ce155166da35ad15d1c537b','https://www.instamojo.com/api/1.1/payment-requests/');
//echo('process');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => false,
        "send_sms" => false,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "/thankyou.php",
        "webhook" => "/webhook.php"
        ));
    print_r($response);
    $pay_ulr = $response['longurl'];
    echo($pay_ulr);
    //Redirect($response['longurl'],302); //Go to Payment page
    header("Location: $pay_ulr");
    exit();
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>