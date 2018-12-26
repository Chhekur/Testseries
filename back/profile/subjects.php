<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_subjects'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from total_subjects");
	$i = 1;
	while($row = mysqli_fetch_array($result)){
		$response .= "<div style=''><div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['subject_name']}</h4></div><div style = 'display:inline-block;'></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
		$i += 1;
	}
	$response .= "<button class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' onclick='new_subject()'>NEW</button>";
	exit($response);
}
elseif ($_POST['chek'] == 'delete'){
	$subject_id = $_POST['id'];
	mysqli_query($con, "DELETE from total_subjects where id = '{$subject_id}'");
	// $result = mysqli_query($con, "SELECT subject_name from total_subjects where id = '{$subject_id}'");
	// $row = mysqli_fetch_array($result);
	// $path = '../../assets/questions/subjects'.$row['subject_name'];
	// rmdir($path);
	exit('success');
}
elseif ($_POST['chek'] == 'new_subject') {
	$subject_name = $_POST['subject_name'];
	$file_name = '../../assets/questions/subjects/'.$subject_name;
	mkdir($file_name,0777,true);
	mysqli_query($con, "INSERT into total_subjects(subject_name) values('{$subject_name}')");
	exit('success');
}
?>