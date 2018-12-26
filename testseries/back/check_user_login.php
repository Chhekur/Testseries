<?php
include_once "dbconnect.php";
if(isset($_COOKIE['login'])){
	$login = $_COOKIE['login'];
	//echo($login);
	$result = mysqli_query($con,"SELECT * from users where login = '{$login}'");
	if($row = mysqli_fetch_array($result)){
		//echo('hello');
		$login = md5(uniqid($row['id'], true));
		mysqli_query($con,"update users set login = '{$login}' where id = '{$row['id']}'");
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
	}else{
		echo('hello');
		header("Location: /logout");
	}
}
?>