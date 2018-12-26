<?php
include_once 'dbconnect.php';
session_start();
if(isset($_SESSION['usr_id']) != ""){
	header('Location: /');
}
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$mobile = $_POST['mobile'];
$refral = $_POST['refral'];
$fname = explode(' ', $name);
$refral_code = $fname[0] . $mobile;
if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    exit();
}
if(strlen($mobile) != 10){
	exit();
}
$result = mysqli_query($con, "select * from users where refral_code = '{$refral}'");
$row = mysqli_fetch_array($result);
$validity = date('Y-m-d', strtotime($row['validity']. ' + 5 days'));

mysqli_query($con,"update users set validity = '{$validity}' where id = '{$row['id']}'");
if(mysqli_query($con,"INSERT INTO users(name, email,password,status,designation,mobile,refral_code,referred_by,login) values('{$name}','{$email}','{$password}','pending','user','{$mobile}','{$refral_code}','{$refral}','logout')")){
	exit('You have successfully registered<br>just wait for approval');
}
else{
	exit('This email is already registered');
}
?>