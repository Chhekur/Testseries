<?php
include_once "dbconnect.php";
session_start();
if(isset($_SESSION['usr_id']) != ""){
	header('Location: /');
}
$email = $_POST['email'];
$password = md5($_POST['password']);
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    exit();
  }
$result = mysqli_query($con, "SELECT * from users where email = '{$email}' and password = '{$password}'");
	if($row = mysqli_fetch_array($result)){
		if($row['status'] == 'pending'){
			exit('wait for account verification');
		}
		elseif($row['login'] != "logout"){
			if(isset($_COOKIE['login'])){
				if($row['login'] != $_COOKIE['login']){
					exit('you are already login somewhere');
				}
			}else{
				exit("you are already login somewhere want to logout click <a href = \"logout?email={$email}\">here</a>");
			}
		}
		else{
			$login = md5(uniqid($row['id'], true));
			mysqli_query($con,"update users set login = '{$login}' where email = '{$email}'");
			setcookie("login", $login, time() + (86400 * 30), "/");
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_name'] = $row['name'];
			$_SESSION['usr_email'] = $row['email'];
			$_SESSION['usr_status'] = $row['status'];
			$_SESSION['usr_designation'] = $row['designation'];
			$_SESSION['refral_code'] = $row['refral_code'];
			$_SESSION['mobile'] = $row['mobile'];
			$temp = date_diff(date_create(date("Y-m-d")),date_create($row['validity']));
			if($temp->format("%R%a") <= 0){
				$_SESSION['validity'] = 0;
			}else{
				$_SESSION['validity'] = $temp -> format("%a");
			}
 			exit('success');
		}
	}else{
		exit("Invalid email or password");
	}
?>