<?php
include_once "../dbconnect.php";
session_start();
$cpassword = $_POST['cpassword'];
$npassword = $_POST['npassword'];
$confirmpassword = $_POST['confirmpassword'];
$chek = false;
$result = mysqli_query($con, "SELECT password from users where id = '{$_SESSION['usr_id']}'");
$row = mysqli_fetch_array($result);
if(md5($cpassword) != $row['password']){
	$chek = true;
	exit("invalid current password");
}
elseif($npassword != $confirmpassword){
	$chek = true;
	exit("new password and confirm password doesn't match");
}
if(!$chek){
	$confirmpassword = md5($confirmpassword);
	mysqli_query($con,"update users set password = '{$confirmpassword}' where id = '{$_SESSION['usr_id']}'");
	exit('success');
}

?>