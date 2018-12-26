<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_categories'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from category");
	$i = 1;
	while($row = mysqli_fetch_array($result)){
		$response .= "<div style=''><div style = 'float:left;margin-right:200px;'><h4>{$i}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['category_name']}</h4></div><div style = 'display:inline-block;'></div><div style = 'float:right;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_category({$row['id']})'>Delete</button></div></div><hr>";
		$i += 1;
	}
	$response .= "<button class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' onclick='new_category()'>NEW</button>";
	exit($response);
}
elseif ($_POST['chek'] == 'delete'){
	$category_id = $_POST['id'];
	mysqli_query($con, "DELETE from category where id = '{$category_id}'");
	exit('success');
}
elseif ($_POST['chek'] == 'new_category') {
	$category_name = $_POST['category_name'];
	mysqli_query($con, "INSERT into category(category_name) values('{$category_name}')");
	exit('success');
}
?>