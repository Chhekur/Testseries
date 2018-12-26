<?php
include_once 'dbconnect.php';
$id = $_POST['id'];
$password = md5($_POST['password']);
mysqli_query($con,"update users set password = '{$password}' where id = '{$id}'");
exit('Password has been changed');
?>