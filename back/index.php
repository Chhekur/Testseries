<?php
include_once "dbconnect.php";
if($_POST['chek'] == 'getFreeCards'){
	$result = mysqli_query($con, "SELECT quiz.id,quiz.quiz_name,quiz.duration from quiz,category where category.category_name = 'FREE' and category.id = quiz.category_id order by quiz.id desc");
	$response = '';
	while($row = mysqli_fetch_array($result)){
		$response .= "<div class = 'card'>
						<center>
							<div class = 'up'><h1 style = 'font-size: 20px;'>{$row['quiz_name']}</h1></div></center>
						<div class = 'down'><span>Subject</span>";
		$Subejcts = mysqli_query($con,"SELECT * from subjects where quiz_id = {$row['id']}");
		while($subject = mysqli_fetch_array($Subejcts)){
			$response .="<p>&nbsp;&nbsp;&nbsp;> {$subject['subject_name']}</p>";
		}
			$response.=	"<hr><h1>Time : {$row['duration']} minutes</h1>
							<h1 style = 'color:red;'>FREE</h1><br>
							<center>
							<form action = \"../back/quiz.php\" method = \"post\"><input style =\"display:none;\" type = \"text\" name = \"quiz_id\" value = \"{$row['id']}\"><button type = 'submit' class = 'button is-success' style = 'width:100%;'>Start</button>
							</form></center>
						</div>
					</div>";
	}
	exit($response);
}
else if($_POST['chek'] == 'getPaidCards'){
	$result = mysqli_query($con, "SELECT * from category order by id desc");
	$response = '';
	while($row = mysqli_fetch_array($result)){
		if($row['category_name'] != 'FREE' && $row['validity'] > date('Y-m-d')){
			$response .= "<div class = 'card'>
							<center>
								<div class = 'up'><h1 style = 'font-size: 20px;'>{$row['category_name']}</h1></div></center>
							<div class = 'down'><span>Subject</span>";
			$subjects = mysqli_query($con,"SELECT subject_name from subjects where quiz_id = '{$row['id']}'");
			while($subject = mysqli_fetch_array($subjects)){
				$response .= "<p>&nbsp;&nbsp;&nbsp;> {$subject['subject_name']}</p>";
			}
			$response .= "<p>{$row['description']}</p>";
			$response.=	"<hr><h1 style = 'color:red;'>Price : {$row['price']} /-</h1><br>
								<center>
								<form action = \"/pay\" method = \"post\"><input id='plans' name='plans[]' value = '{$row['id']}' style = 'display:none;'><input style = 'display:none;' name = 'price[]' value = '{$row['price']}'><button type = 'submit' class = 'button is-danger' style = 'width:100%;'>Buy Now</button>
								</form></center>
							</div>
						</div>";
		}
	}
	exit($response);
}
?>