<?php
include_once '../dbconnect.php';
session_start();
if($_POST['chek'] == 'get_plans'){
	$result = mysqli_query($con, "SELECT * from category");
	$response = "<form action = '/pay' method = 'post'><table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th></th><th></th><th style = 'padding-bottom:20px;'>Name</th><th style = 'padding-bottom:20px;'>Price</th></tr>";
	$i = 1;
	while($row = mysqli_fetch_array($result)){
		$found = 0;
		for($j = 0; $j < sizeof($_SESSION['quiz']); $j ++){
			if($row['id'] == $_SESSION['quiz'][$j]) $found = 1;
		}
		if($row['price'] != 0 && !$found && $row['validity'] >= date('Y-m-d')){
			$response .= "<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'>{$i}</td><td style = 'padding-top:20px;padding-bottom:20px;'><input id='plans' type = 'checkbox' name='plans[]' value = '{$row['id']}'></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['category_name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><input style = 'display:none;' name = 'price[]' value = '{$row['price']}'><h4>{$row['price']} /-</h4></td><tr>";
			$i += 1;
		}
	}
	$response .= "</table><br><input id = 'confirm' type = 'checkbox' >&nbsp;Agree to all terms and conditions<br><br><button id = 'next' class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' id = 'next'>Next</button></form><script>$('#confirm').change(function () { $('#next').prop(\"disabled\", !this.checked);}).change()</script>";
	exit($response);
}

?>