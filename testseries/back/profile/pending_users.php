<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_pending_users'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from users where status = 'pending'");
	$i = 1;
	$response .= "<table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th style = 'padding-bottom:20px;'>Name</th><th style = 'padding-bottom:20px;'>Email</th><th style = 'padding-bottom:20px;'>Extra</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$response.= "<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['email']}</h4><td style = 'padding-top:20px;padding-bottom:20px;'><button class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'approve({$row['id']})'>Approve</button><br></td></tr>";
		$i += 1;
	}
	exit($response);
}
elseif ($_POST['chek'] == 'approve') {
	$id = $_POST['id'];
	mysqli_query($con, "UPDATE users set status = 'active' where id = '{$id}'");
	exit('success');
}
?>