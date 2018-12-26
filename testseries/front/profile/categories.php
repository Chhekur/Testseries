<?php
session_start();
if(isset($_SESSION['usr_id']) == ""){
	header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Login V2</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/../../css/bulma.css">
	<link rel="stylesheet" type="text/css" href="/../../css/main.css">
	<script src="/../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src = "/../../js/materialize.js" ></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
	@media screen and (min-width: 640px){
		html{
			background-color: #f7f7f7;
		}
	}
</style>
<body>
	<section>
		<?php include_once "sidebar.php";?>
		<div class = "right">
				<?php include_once "profile_navbar.php";?>
				<center><br><br>
					<h2 style="font-size: 24px;">Categories</h2>
					<div id = "right_sidebar" class = "profile-right-sidebar"></div>

				</center>
			</div>
	</section>
</body>
</html>
<script>
	function new_category(){
		$('#right_sidebar').append('<br><br><input id = "category_name" style = "padding:5px; vertical-align:top;" type = "text" placeholder = "Category Name"><button style = " height:31px; font-size:14px;margin-left:5px;" class = "button is-link" onclick = "save()">submit</button>');		
		// $.ajax({
		// 	url : '/../../back/profile/categories.php',
		// 	type : 'post',
		// 	data : ({'chek': 'delete'}),
		// 	success : function(response){
		// 		location.reload();
		// 	}
		// });
	}
	function save(){
		category_name = $('#category_name').val();
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek':'new_category','category_name':category_name}),
			success:function(response){
				location.reload();
			}
		});
	}
	function delete_category(id){
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek': 'delete', 'id':id}),
			success : function(response){
				location.reload();
			}
		});
	}
	
	$.ajax({
		url : '../../back/profile/categories.php',
		type : 'post',
		data : ({'chek':'get_categories'}),
		success : function(response){
			$('#right_sidebar').html(response);
			//console.log(response);
		}
	});

	$(".button-collapse").sideNav();
     $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
</script>
<script src="/../js/login.js"></script>