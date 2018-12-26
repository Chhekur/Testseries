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
					<h2 style="font-size: 24px;">New Quiz</h2>
					<div id = "right_sidebar" class = "profile-right-sidebar">
						<input id = "quiz_name" style="height:25px;" type = "text" placeholder="Quiz Name"><br>
						<textarea placeholder="Description" id = "description"></textarea><br>
						<select id = "category"></select><br>
						<input id = "duration" type = "number" placeholder="Duration"><br>
						<input type = "text" id = "nsubjects" placeholder="No. Of Subjects"><br>
						<button class = "button is-link" style="height:20px;padding-top:0px;font-size:12px;" onclick = "add_subject()">Add</button>
						<br>
					</div>

				</center>
			</div>
	</section>
</body>
</html>
<script>
	n = 0;
	function add_subject(){
		//console.log(subject);
		//console.log(n);
		n = $('#nsubjects').val();
		n = parseInt(n);
		for(var i = 1; i < n+1; i++){
			temp = '<select id = "subject'+i+'">'+subject+'</subject><input type = "number" id = "questions'+i+'">';
			//console.log(temp);
			$('#right_sidebar').append(temp);
			$('#right_sidebar').append('<br>');
		}
		$('#right_sidebar').append('<button class = "button is-link" style="height:20px;padding-top:0px;font-size:12px;" onclick = "submit()">SUBMIT</button>');
	}
	function submit(){
		quiz_name = $('#quiz_name').val();
		description = $('#description').val();
		category = $('#category').val();
		duration = $('#duration').val();
		//console.log(quiz_name,description,category,duration);
		$.ajax({
			url : '../../back/profile/new_quiz.php',
			type : 'post',
			data : ({'chek':'new_quiz','quiz_name':quiz_name, 'description':description, 'category':category, 'duration':duration}),
			success:function(response){
				console.log(response);
			}
		});
		sub = [];
		que = [];
		for(var i = 1; i < n+1; i++){
			sub.push($('#subject'+i).val());
			que.push($('#questions'+i).val());
		}
			$.ajax({
				url : '../../back/profile/new_quiz.php',
				type : 'post',
				data : ({'chek':'add_sub','subject_name':sub,'questions':que,'quiz_name':quiz_name}),
				success:function(response){
					console.log(response);
				}
			});
	}
	$.ajax({
		url : '../../back/profile/new_quiz.php',
		type : 'post',
		data : ({'chek':'get_subjects'}),
		success : function(response){
			subject = response;
			//console.log(response);
		}
	});
	$.ajax({
		url : '../../back/profile/new_quiz.php',
		type : 'post',
		data : ({'chek':'get_categories'}),
		success : function(response){
			$('#category').html(response);
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