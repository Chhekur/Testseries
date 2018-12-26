<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_subjects'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from total_subjects");
	while($row = mysqli_fetch_array($result)){
		$response .= "<option value = '{$row['subject_name']}'>{$row['subject_name']}</option>";
		//$response .= "<div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['quiz_name']}</h4></div><div style = 'display:inline-block;'><h4>{$ccategory}</h4></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_subject({$row['id']})'>Delete</button></div></div><hr>";
	}
	exit($response);
}
elseif ($_POST['chek'] == 'add_question') {
	$filename = $_POST['filename'];
	$problem = $_POST['problem'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 = $_POST['option3'];
	$option4 = $_POST['option4'];
	$answer = $_POST['answer'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$result = mysqli_query($con,"SELECT * from total_subjects where subject_name = '{$subject}'");
	$row = mysqli_fetch_array($result);
	if ($filename != "")$file_name = '../../assets/questions/subjects/'.$subject.'/'.$filename;
	else $file_name = '../../assets/questions/subjects/'.$subject.'/'.($row['last_question']+1);
	echo($file_name);
	$file = fopen($file_name,'w');
	$data = $problem.'@'.$option1.'@'.$option2.'@'.$option3.'@'.$option4.'@'.$answer.'@'.$description;
	fwrite($file, $data);
	fclose($file);
	$temp = $row['total_question'] + 1;
	$temp2 = $row['last_question'] + 1;
	if($filename == "") mysqli_query($con, "UPDATE total_subjects set total_question = '{$temp}', last_question = '{$temp2}' where subject_name = '{$subject}'");
	exit('success');
}
?>