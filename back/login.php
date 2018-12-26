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
					exit("you are already login somewhere want to logout click <a href = \"logout?email={$email}\">here</a>");
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
			//$_SESSION['quiz'] = $row['quiz'];
			$_SESSION['quiz'] = array();
			$today_date = date('Y-m-d');
			$quiz = split(',',$row['quiz']);
			for($i = 0; $i < sizeof($quiz); $i ++){
				$result = mysqli_query($con,"SELECT * from category where id = '{$quiz[$i]}'");
				if($row = mysqli_fetch_array($result)){
					if($row['validity'] >= $today_date){
						array_push($_SESSION['quiz'],$row['id']);
					}
				}
			}
			$temp_quiz = '';
			for($i = 0; $i < sizeof($_SESSION['quiz']); $i ++){
				if($i != sizeof($_SESSION['quiz']) -1 ){
					$temp_quiz .= $_SESSION['quiz'][$i] . ',';
				}else{
					$temp_quiz .= $_SESSION['quiz'][$i];
				}
			}
			mysqli_query($con,"UPDATE users set quiz = '{$temp_quiz}' where id = '{$_SESSION['usr_id']}'");
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