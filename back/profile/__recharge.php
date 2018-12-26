<?php
include_once "dbconnect.php";
if($_POST['chek'] == 'get_payment_options'){
	$price = $_POST['price'];
	//$response = '<div class = "profile-box" style = "width:70%;"><h1 style = "text-align:left;">Wallets</h1><br>';
	//$response .= '<div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">Paytm</h1></div><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;" onclick = pay('.$price.',"paytm")>Pay</button></div><br><hr>';
	//$response .= '<div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">Bhim App</h1></div><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;" onclick = pay('.$price.',"bhim")>Pay</button></div><br><hr>';
	//$response .= '<div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">Tej App</h1></div><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;" onclick = pay('.$price.',"tej")>Pay</button></div><br>';
	//$response .= '</div>';
	//$response .= '<div class = "profile-box" style = "width:70%;"><h1 style = "text-align:left;">IMPS</h1><br><div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">IMPS</h1></div><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;" onclick = pay('.$price.',"imps")>Pay</button></div><br></div>';
	//$response .= '<div class = "profile-box" style = "width:70%;"><div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">UPI</h1></div><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;" onclick = pay('.$price.',"upi")>Pay</button></div><br></div>';
	$response .= '<div class = "profile-box" style = "width:70%;"><h1 style = "text-align:left;">Payment Options</h1><br><div><div style = "float:left;"><img src = "" style = "display:inline-block;"><h1 style = "display:inline-block;">Credit Card / Debit Card / Net Banking</h1></div><form action = "/pay" method = "post"><input style = "display:none;" type = "text" name = "product_name" value = "'.$price.'_rs_recharge"><input style = "display:none;" type = "text" name = "product_price" value = "'.$price.'"><input style = "display:none;" type = "text" name = "name" value = "'.$_SESSION['usr_name'].'"><input style = "display:none;" type = "text" name = "phone" value = "'.$_SESSION['mobile'].'"><input style = "display:none;" type = "text" name = "email" value = "'.$_SESSION['usr_email'].'"><button class = "button is-warning" style = "height:20px;padding-top:0px;font-size:12px; float:right;">Pay</button></form></div><br></div>';
}
switch ($_POST['chek']) {
	case 'paytm':
		$option = '<div class = "profile-box" style = "width:70%;"><h1>Mobile:  9826440856</h1><br><img src = "../../assets/payment/paytm.jpg" style="width:300px;" /><br><h1>After payment fill this <a href = "https://goo.gl/forms/RvMIZzOpAZdBkirJ2">form</a></h1></div>';
		exit($option);
		break;
	case 'bhim':
		$option = '<div class = "profile-box" style = "width:70%;"><h1>Mobile:  9826440856</h1><br><img src = "../../assets/payment/bhim.jpg" style="width:300px;" /><br><h1>After payment fill this <a href = "https://goo.gl/forms/RvMIZzOpAZdBkirJ2">form</a></h1></div>';
		exit($option);
		break;
	case 'tej':
		$option = '<div class = "profile-box" style = "width:70%;"><h1>Open TEZ Apps</h1><h1>↓</h1><h1>Go to New Payment</h1><h1>↓</h1><h1>Enter Mobile No. : 9826440856</h1><h1>↓</h1><h1>Confirm Name - Deep Groups</h1><h1>↓</h1><h1>Pay Now</h1><br><h1>After payment fill this <a href = "https://goo.gl/forms/RvMIZzOpAZdBkirJ2">form</a></h1></div>';
		exit($option);
		break;
	case 'imps':
		$option = '<div class = "profile-box" style = "width:70%;"><h1>Payee Name : Deep Groups</h1><h1>↓</h1><h1>IFSC Code : SBIN0030258</h1><h1>↓</h1><h1>Account No. : 35108161559
		</h1><h1>↓</h1><h1>And Mark Payment</h1><br><h1>After payment fill this <a href = "https://goo.gl/forms/RvMIZzOpAZdBkirJ2">form</a></h1></div>';
		exit($option);
		break;
	case 'upi':
		$option = '<div class = "profile-box" style = "width:70%;"><h1>Virtual Payment UPI Address: 9826440856@upi
		</h1><br><h1>After payment fill this <a href = "https://goo.gl/forms/RvMIZzOpAZdBkirJ2">form</a></h1></div>';
		exit($option);
		break;
}
?>