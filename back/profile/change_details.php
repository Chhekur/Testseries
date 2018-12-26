<?php
include_once "../dbconnect.php";
session_start();
$name = $_POST['names'];
$email = $_POST['emails'];
$chek = false;
if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
	$chek = true;
    exit("name contains only letters");
  }
if(!$chek){
	mysqli_query($con,"update users set name = '{$name}',email = '{$email}' where id = '{$_SESSION['usr_id']}'");
	exit('changes saved');
}

?>