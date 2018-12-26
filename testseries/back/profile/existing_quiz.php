<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_quiz'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from quiz");
	$result1 = mysqli_query($con, "SELECT * from category");
	$category = Array();
	// while($row = mysqli_fetch_array($result1)){
	// 	array_push($category,$row['category_name']);
	// }//print_r($category);
	$i = 1;
	$response .= "<table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th style = 'padding-bottom:20px;'>Quiz Name</th><th style = 'padding-bottom:20px;'>Category</th><th style = 'padding-bottom:20px;'>Subjects</th><th style = 'padding-bottom:20px;'>Extra</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$subject = "";
		$tc = mysqli_query($con,"SELECT * from category where id = '{$row['category_id']}'");
		$category = mysqli_fetch_array($tc);
		$ccategory = $category['category_name'];
		$result2 = mysqli_query($con, "SELECT * from subjects where quiz_id = '{$row['id']}'");
		$subject .= '<table width=100% id = "subject_table'.$row['id'].'">';
		while($row1 = mysqli_fetch_array($result2)){
			$subject .='<tr><td>'.$row1['subject_name'].'</td><td>'.$row1['questions'].'</td><td><button class = "button is-danger" style="height:20px;padding-top:0px;font-size:12px;" onclick = "delete_subject('.$row1['id'].')">Delete</button></td></tr>';
		}
		$subject .= '</table>';
		$response.= "<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['quiz_name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$ccategory}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$subject}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_quiz({$row['id']})'>Delete</button><br><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'add_subject({$row['id']})'>Add Subject</button></td></tr>";
		//$response .= "<div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&newt_listbox_set_current_by_key(listbox, key)p;{$row['quiz_name']}</h4></div><div style = 'display:inline-block;'><h4>{$ccategory}</h4></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
		$i += 1;
	}
	$response .= "</table><br><button class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'add_quiz()'>NEW</button>";
	exit($response);
}
elseif($_POST['chek'] == 'new_quiz'){
	$quiz_name = $_POST['quiz_name'];
	$category_id = $_POST['category_id'];
	$duration = $_POST['duration'];
	mysqli_query($con,"INSERT into quiz (category_id,quiz_name,duration) values ('{$category_id}','{$quiz_name}','{$duration}')");
	exit('success');
}
elseif($_POST['chek'] == 'get_categories'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from category");
	while($row = mysqli_fetch_array($result)){
		$response.= "<option value = '{$row['id']}'>{$row['category_name']}</option>";
		//$response .= "<div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['quiz_name']}</h4></div><div style = 'display:inline-block;'><h4>{$ccategory}</h4></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
	}
	exit($response);
}
elseif ($_POST['chek'] == 'delete'){
	$quiz_id = $_POST['id'];
	mysqli_query($con, "DELETE from quiz where id = '{$quiz_id}'");
	mysqli_query($con, "DELETE from subjects where quiz_id = '{$quiz_id}'");
	// $result = mysqli_query($con, "SELECT subject_name from total_subjects where id = '{$subject_id}'");
	// $row = mysqli_fetch_array($result);
	// $path = '../../assets/questions/subjects'.$row['subject_name'];
	// rmdir($path);
	exit('success');
}
elseif ($_POST['chek'] == 'delete_subject'){
	$subject_id = $_POST['id'];
	mysqli_query($con,"DELETE from subjects where id = '{$subject_id}'");
	exit('success');
}
elseif($_POST['chek'] == 'save'){
	$subject_name = $_POST['subject_name'];
	$quiz_id = $_POST['quiz_id'];
	$questions = $_POST['questions'];
	echo($subject_name);
	echo($quiz_id);
	echo($questions);
	mysqli_query($con, "INSERT into subjects (quiz_id,subject_name,questions) values('$quiz_id','$subject_name','$questions')");
	exit('success');
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
// elseif ($_POST['chek'] == 'new_subject') {
// 	$subject_name = $_POST['subject_name'];
// 	$file_name = '../../assets/questions/subjects/'.$subject_name;
// 	mkdir($file_name,0777,true);
// 	mysqli_query($con, "INSERT into total_subjects(subject_name) values('{$subject_name}')");
// 	exit('success');
// }
?>