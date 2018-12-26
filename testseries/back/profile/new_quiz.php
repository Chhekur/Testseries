<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_categories'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from category");
	while($row = mysqli_fetch_array($result)){
		$response.= "<option value = '{$row['id']}'>{$row['category_name']}</option>";
		//$response .= "<div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['quiz_name']}</h4></div><div style = 'display:inline-block;'><h4>{$ccategory}</h4></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
	}
	exit($response);
}
elseif($_POST['chek'] == 'get_subjects'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from total_subjects");
	while($row = mysqli_fetch_array($result)){
		$response.= "<option value = '{$row['subject_name']}'>{$row['subject_name']}</option>";
		//$response .= "<div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['quiz_name']}</h4></div><div style = 'display:inline-block;'><h4>{$ccategory}</h4></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
	}
	exit($response);
}
elseif ($_POST['chek'] == 'new_quiz') {
	$quiz_name = $_POST['quiz_name'];
	$description = $_POST['description'];
	$duration = $_POST['duration'];
	$category = $_POST['category'];
	mysqli_query($con, "INSERT into quiz(category_id,quiz_name,description,duration) values('{$category}','{$quiz_name}','{$description}',{$duration})");
	exit('success');
}
elseif ($_POST['chek'] == 'add_sub') {
	$result = mysqli_query($con, "SELECT * from quiz where quiz_name = {$_POST['quiz_name']}");
	$row = mysqli_fetch_array($result);
	$subject_name = $_POST['subject_name'];
	$questions = $_POST['questions'];
	echo($row['id']);
	sleep(1);
	for ($i=0; $i < sizeof($subject_name); $i++) {
		$sub = $subject_name[$i];
		$que = $questions[$i];
		mysqli_query($con, "INSERT into subjects(quiz_id,subject_name,questions) values('{$row['id']}','{$sub}','{$que}')");
	}
	exit('success');
}
?>