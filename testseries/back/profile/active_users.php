<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_active_users'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from users where status = 'active' and designation != 'admin'");
	$i = 1;
	$response .= "<table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th style = 'padding-bottom:20px;'>Name</th><th style = 'padding-bottom:20px;'>Email</th><th style = 'padding-bottom:20px;'>Password</th><th style = 'padding-bottom:20px;'>Validity</th><th style = 'padding-bottom:20px;'>Referral</th><th style = 'padding-bottom:20px;'>Extra</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$count = mysqli_query($con,"SELECT count(id) from users where referred_by = '{$row['refral_code']}'");
		$count = mysqli_fetch_array($count);
		$response.="<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['email']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'></h4><table width = 100% id = password_change_user_id{$row['id']}><tr><td><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'change_password({$row['id']})'>Change</button></td></tr></table></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['validity']}</h4><table width = 100% id = user_id{$row['id']}><tr><td><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'change_validity({$row['id']})'>Change</button></td></tr></table></td><td style = 'padding-top:20px;padding-bottom:20px;'>{$count[0]}</td><td style = 'padding-top:20px;padding-bottom:20px;'><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'suspend({$row['id']})'>Suspend</button><br></td></tr>";
		$i += 1;
	}
	exit($response);
}
elseif($_POST['chek'] == 'change_validity'){
	$id = $_POST['id'];
	$validity = $_POST['validity'];
	mysqli_query($con, "update users set validity = '{$validity}' where id = '{$id}'");
}
elseif($_POST['chek'] == 'change_password'){
	$id = $_POST['id'];
	$password = md5($_POST['password']);
	mysqli_query($con, "update users set password = '{$password}' where id = '{$id}'");
}
elseif ($_POST['chek'] == 'suspend') {
	$id = $_POST['id'];
	mysqli_query($con, "UPDATE users set status = 'suspend' where id = '{$id}'");
	exit('success');
}
?>