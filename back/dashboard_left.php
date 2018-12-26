<?php
include_once "dbconnect.php";
$response = "";
for($i = 0; $i < sizeof($_SESSION['quiz']) + 1; $i ++){
	if($i == sizeof($_SESSION['quiz']))
		$category = mysqli_query($con,"SELECT * from category where category_name = 'FREE'");
	else
		$category = mysqli_query($con,"SELECT * from category where id = '{$_SESSION['quiz'][$i]}'");
	
	//$demo = "";
	while($row = mysqli_fetch_array($category)){
		
		$response .= "<hr width=90% style = 'margin:0px;'><button class=\"accordion\">{$row['category_name']}</button><div class = \"panel\" style= \"text-align:left;margin:0px;\">";
		$quiz = mysqli_query($con,"SELECT * from quiz where category_id = {$row['id']}");
		// if($row['category_name'] == "FREE"){
		// 	$demo .= "<hr width=90% style = 'margin:0px;'><button class=\"accordion\">{$row['category_name']}</button><div class = \"panel\" style= \"text-align:left;margin:0px;\">";
		// }
		while($row1 = mysqli_fetch_array($quiz)){
			$response .= "<p class = \"quiz_name\" onclick=\"right_side('{$row1['quiz_name']}','{$row1['id']}')\" >{$row1['quiz_name']}</p>";
			// if($row['category_name'] == "FREE"){
			// 	$demo .= "<p class = \"quiz_name\" onclick=\"right_side('{$row1['quiz_name']}','{$row1['id']}')\" >{$row1['quiz_name']}</p>";
			// }

		}
		$response .= "</div>";
	}
	$response.="<hr width=90% style='margin:0px;'>";
}
?>