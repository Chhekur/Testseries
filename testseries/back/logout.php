<?php
include_once "dbconnect.php";
session_start();
if(isset($_SESSION['usr_id'])) {
	//echo('hello');
	mysqli_query($con,"update users set login = 'logout' where id = '{$_SESSION['usr_id']}'");
	setcookie("login", "", time() - 3600);
	session_destroy();
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	header("Location: /");
} else {
	mysqli_query($con,"update users set login = 'logout' where email = '{$_GET['email']}'");
	echo($_GET['email']);
	setcookie("login", "", time() - 3600);
	header("Location: /");
}
?>