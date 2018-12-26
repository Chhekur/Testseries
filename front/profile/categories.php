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

	function change_description(id,value){
		$('#description'+id).html('<textarea id = "description">'+value+'</textarea> &nbsp;<button style = " height:31px; font-size:14px;margin-left:5px;" class = "button is-link" onclick = "save_description('+id+')">SAVE</button>');
	}
	function change_price(id){
		$('#price_change'+id).html('<input id = "new_price" type = "text">&nbsp;<button style = " height:31px; font-size:14px;margin-left:5px;" class = "button is-link" onclick = "save_new_price('+id+')">submit</button>');
	}

	function save_description(id){
		var description = $('#description').val();
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek' : 'save_description','category_id':id,'description':description}),
			success : function(response){
				console.log(response);
				if(response == 'success'){
					location.reload();
				}
			}
		});
	}
	function save_new_price(id){
		var new_price = $('#new_price').val();
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek':'change_price','category_id':id,'new_price':new_price}),
			success:function(response){
				//console.log(response);
				location.reload();
			}
		});
	}

	function change_validity(id){
		$('#category_id'+id).html('<input id = "new_validity" type = "date">&nbsp;<button style = " height:31px; font-size:14px;margin-left:5px;" class = "button is-link" onclick = "save_new_validity('+id+')">submit</button>');
	}

	function save_new_validity(id){
		var new_validity = $('#new_validity').val();
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek':'change_validity','category_id':id,'new_validity':new_validity}),
			success:function(response){
				//console.log(response);
				location.reload();
			}
		});
	}

	function new_category(){
		$('#right_sidebar').append('<br><br><input id = "category_name" style = "padding:5px; vertical-align:top;" type = "text" placeholder = "Category Name">&nbsp;<textarea id = "description" placeholder = "Description"></textarea>&nbsp;<input id = "category_price" style = "padding:5px; vertical-align:top;" type = "text" placeholder = "Price">&nbsp;<input id = "category_validity" style = "padding:5px; vertical-align:top;" type = "date" placeholder = "Validity"><button style = " height:31px; font-size:14px;margin-left:5px;" class = "button is-link" onclick = "save()">submit</button>');		
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
		description = $('#description').val();
		category_price = $('#category_price').val();
		category_validity = $('#category_validity').val();
		$.ajax({
			url : '../../back/profile/categories.php',
			type : 'post',
			data : ({'chek':'new_category','description':description,'category_name':category_name,'category_price':category_price,'category_validity':category_validity}),
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