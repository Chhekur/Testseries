<?php
include_once "../dbconnect.php";
session_start();
if($_POST['chek'] == 'get_referrals'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from users where referred_by = '{$_SESSION['refral_code']}' and designation != 'admin'");
	$i = 1;
	$response .= "<table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th style = 'padding-bottom:20px;'>Name</th><th style = 'padding-bottom:20px;'>Email</th><th style = 'padding-bottom:20px;'>Mobile</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$response.= "<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['email']}</h4><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['mobile']}</h4><br></td></tr>";
		
		$i += 1;
	}
	exit($response);
}
?>