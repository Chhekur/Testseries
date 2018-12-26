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
	<link rel="stylesheet" type="text/css" href="/../css/bulma.css">
	<link rel="stylesheet" type="text/css" href="/../css/main.css">
	<link rel="stylesheet" type="text/css" href="/../css/login.css">
	<script src="/../js/jquery-3.2.1.min.js"></script>
	<script src = "/../js/svg-img.js"></script>
	<script type="text/javascript" src = "/../js/materialize.js" ></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
	html{
		background-color: #f7f7f7;
	}
</style>
<body>
	<section>
		<?php include_once "sidebar.php";?>
		<div class = "right">
				<?php include_once "profile_navbar.php";?>
				<center>
					<div id = "right_sidebar"><br>
						<div class = "profile-box" id = "total_user_count"><i class="material-icons" style="font-size: 50px; vertical-align: top;">person_outline</i></div>
						<div class = "profile-box" id = "total_active_user_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:#11c711;">person_outline</i></div>
						<div class = "profile-box" id = "total_pending_user_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:#c79311;">person_outline</i></div>
						<div class = "profile-box" id = "total_suspended_user_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:#e60e0e;">person_outline</i></div>
						<div class = "profile-box" id = "total_online_user_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:#11c711;">person_outline</i></div>
						<div class = "profile-box" id = "total_quiz_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:000;">book</i></div>
						<div class = "profile-box" id = "total_subjects_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:000;">subject</i></div>
						<div class = "profile-box" id = "total_categories_count"><i class="material-icons" style="font-size: 50px; vertical-align: top; color:000;">category</i></div>
						<!-- <div class = "profile-box" id = "details" style="text-align: left;">
							<h1 style = "display:inline-block; font-size:20px;">Version : <span style = "font-size:15px;">1.0.0</span></h1><br>
							<h1 style = "display:inline-block; font-size:20px;">Made By : <span style = "font-size:15px;">Chhekur</span></h1><br>
							<h1 style = "display:inline-block; font-size:20px;">Version : <span style = "font-size:15px;">1.0.0</span></h1><br>
							<h1 style = "display:inline-block; font-size:20px;">Made By : <span style = "font-size:15px;">Chhekur</span></h1><br>
							<h1 style = "display:inline-block; font-size:20px;">Version : <span style = "font-size:15px;">1.0.0</span></h1><br>
							<h1 style = "display:inline-block; font-size:20px;">Made By : <span style = "font-size:15px;">Chhekur</span></h1>

						</div> -->
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_user_count'}),
		success : function(response){
			console.log(response);
			$('#total_user_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Total users</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_active_user_count'}),
		success : function(response){
			console.log(response);
			$('#total_active_user_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Active users</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_pending_user_count'}),
		success : function(response){
			console.log(response);
			$('#total_pending_user_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Pending users</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_suspended_user_count'}),
		success : function(response){
			console.log(response);
			$('#total_suspended_user_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Suspended users</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_online_user_count'}),
		success : function(response){
			console.log(response);
			$('#total_online_user_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Online users</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_quiz_count'}),
		success : function(response){
			console.log(response);
			$('#total_quiz_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Total quiz</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_subjects_count'}),
		success : function(response){
			console.log(response);
			$('#total_subjects_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Total subjects</span></h1>');
		}
	});
	$.ajax({
		url : '../../back/profile/profile.php',
		type : 'post',
		data : ({'chek':'get_total_categories_count'}),
		success : function(response){
			console.log(response);
			$('#total_categories_count').append('<h1 style = "display:inline-block; font-size:30px;margin-left:50px;">'+response+'<br><span style = "font-size:15px;">Total categories</span></h1>');
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