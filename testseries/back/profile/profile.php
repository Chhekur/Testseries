<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_total_user_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from users");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_active_user_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from users where status = 'active'");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_pending_user_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from users where status = 'pending'");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_suspended_user_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from users where status = 'suspend'");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_online_user_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from users where login != 'logout'");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_quiz_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from quiz ");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_subjects_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from total_subjects ");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
elseif($_POST['chek'] == 'get_total_categories_count'){
	$c = 0;
	$result = mysqli_query($con,"SELECT * from category ");
	while($row = mysqli_fetch_array($result)){
		$c++;
	}
	echo($c);
}
?>