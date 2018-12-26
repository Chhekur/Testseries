<?php
include_once "dbconnect.php";
$response = "";
if ($_POST['chek'] == 'right_side'){
	$result = mysqli_query($con, "SELECT * from quiz where quiz_name = '{$_POST['quiz_name']}'");
	$subjects = mysqli_query($con,"SELECT * from subjects where quiz_id = '{$_POST['quiz_id']}'");
	while($row = mysqli_fetch_array($result)){
		$sub = '<table width = 50%>';
		while($subject = mysqli_fetch_array($subjects)){
			$sub .= "<tr><td>{$subject['subject_name']}</td><td>:</td><td>{$subject['questions']}  Questions</td></tr>";
			//$sub .= "<h2>{$subject['subject_name']} : {$subject['questions']} Questions</h2>";
		}
		$sub .= "</table>";
		$response .= "<div style = 'text-align:left;padding:50px;'><h1 style = 'font-size:40px;'>{$row['quiz_name']}</h1><br><p>{$row['description']}</p><br><br><div>{$sub}</div><br><div>Duration  : {$row['duration']} Minutes</div><br><br><form action = \"../back/quiz.php\" method = \"post\"><input style =\"display:none;\" type = \"text\" name = \"quiz_id\" value = \"{$row['id']}\"><div class = \"container-login100-form-btn\" style = \"width:200px;\"><div class = \"wrap-login100-form-btn\"><div class = \"login100-form-bgbtn\"></div><button type = \"submit\" class = \"login100-form-btn\">Start</button></div></div></form></div>";
	}
	exit($response);
}
?>