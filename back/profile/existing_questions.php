<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_subjects'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from total_subjects");
	$i = 1;
	while($row = mysqli_fetch_array($result)){
		$response .= "<div style=''><div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['subject_name']}</h4></div><div style = 'display:inline-block;'></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'get_questions(\"{$row['subject_name']}\")'>Questions</button></div></div><hr>";
		$i += 1;
	}
	exit($response);
}
elseif($_POST['chek'] == 'get_questions'){
	$response = '';
	$fileList = glob('../../assets/questions/subjects/'.$_POST['subject_name'].'/*');
	foreach($fileList as $filename){
		$temp_name = substr($filename, 6);
	   $response .= '<a href = "/profile/edit_question?path='.$temp_name.'">'.$filename .'</a><br>';
	}
	exit($response);
}
?>