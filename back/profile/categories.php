<?php
include_once "../dbconnect.php";
if($_POST['chek'] == 'get_categories'){
	$response = '';
	$result = mysqli_query($con, "SELECT * from category");
	$i = 1;
	$response .= "<table width=100%><tr style = 'border-bottom:1px solid #dbdbdb;'><th style = 'padding-bottom:20px;'>Name</th><th style = 'padding-bottom:20px;'>Description</th><th style = 'padding-bottom:20px;'>Price</th><th style = 'padding-bottom:20px;'>Validity</th><th style = 'padding-bottom:20px;'>Extra</th></tr>";
	while($row = mysqli_fetch_array($result)){
		$response.="<tr style = 'border-bottom:1px solid #dbdbdb;'><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['id']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['category_name']}</h4></td><td style = 'padding-top:20px;padding-bottom:20px;'><div id =  'description{$row['id']}'><h4>{$row['description']}</h4><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'change_description({$row['id']},\"{$row['description']}\")'>Edit</button></div></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['price']}</h4><table width = 100% id = price_change{$row['id']}><tr><td><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'change_price({$row['id']})'>Change</button></td></tr></table></td><td style = 'padding-top:20px;padding-bottom:20px;'><h4>{$row['validity']}</h4><table width = 100% id = category_id{$row['id']}><tr><td><button class = 'button is-warning' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'change_validity({$row['id']})'>Change</button></td></tr></table></td><td style = 'padding-top:20px;padding-bottom:20px;'><button class = 'button is-danger' style='height:20px;padding-top:0px;font-size:12px;' onclick = 'delete_category({$row['id']})'>Delete</button><br></td></tr>";
		$i += 1;
	}
	$response .= "</table><button class = 'button is-success' style='height:20px;padding-top:0px;font-size:12px;' onclick='new_category()'>NEW</button>";
	exit($response);
}
elseif ($_POST['chek'] == 'delete'){
	$category_id = $_POST['id'];
	mysqli_query($con, "DELETE from category where id = '{$category_id}'");
	exit('success');
}
elseif ($_POST['chek'] == 'new_category') {
	$category_name = $_POST['category_name'];
	$description = $_POST['description'];
	$category_price = $_POST['category_price'];
	$category_validity = $_POST['category_validity'];
	mysqli_query($con, "INSERT into category(category_name,description,price, validity) values('{$category_name}','{$description}','{$category_price}','{$category_validity}')");
	exit('success');
}
elseif ($_POST['chek'] == 'change_price'){
	$category_id = $_POST['category_id'];
	$new_price = $_POST['new_price'];
	mysqli_query($con,"UPDATE category set price = '{$new_price}' where id = '{$category_id}' ");
	exit('success');
}
elseif ($_POST['chek'] == 'change_validity'){
	$category_id = $_POST['category_id'];
	$new_validity = $_POST['new_validity'];
	mysqli_query($con,"UPDATE category set validity = '{$new_validity}' where id = '{$category_id}' ");
	exit('success');
}
elseif ($_POST['chek'] == 'save_description'){
	$category_id = $_POST['category_id'];
	$description = $_POST['description'];
	mysqli_query($con,"UPDATE category set description = \"{$description}\" where id = '{$category_id}' ");
	exit('success');
}
?>