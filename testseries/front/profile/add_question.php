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
					<h2 style="font-size: 24px;">Add Question</h2>
					<div id = "right_sidebar" class = "profile-right-sidebar">
						<input style="font-size:18px;" type="text" id="filename" placeholder="File Name">&nbsp;&nbsp;<br><br>
						<textarea style="padding:10px;width: 100%; height:100px; word-wrap: break-word;font-size:18px;" placeholder="Problem Statement" id = "problem" onkeyup = 'preview()'></textarea><br>Preview: <br><div id = "preview"></div><br><br>
						<input style="font-size:18px;" type="text" id="option1" placeholder="Option 1">&nbsp;&nbsp;
						<input style="font-size:18px;" type="text" id="option2" placeholder="Option 2"><br><br>
						<input style="font-size:18px;" type="text" id="option3" placeholder="Option 3">&nbsp;&nbsp;
						<input style="font-size:18px;" type="text" id="option4" placeholder="Option 4"><br><br>
						<input style="font-size:18px;" type="text" id="answer" placeholder="Answer">&nbsp;&nbsp;<br><br><textarea style="padding:10px;width: 100%; height:100px; word-wrap: break-word;font-size:18px;" placeholder="Description" id = "description"></textarea><br>
						<select style="font-size:18px;" id = "subject"></select><br><br>
						<button onclick = "save()" class = "button is-link" style='height:25px;padding-top:0px;font-size:12px;'>Save</button>
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	function preview(){
		$('#preview').html($('#problem').val());
	}
	function save(){
		//console.log("hello");
		filename = $('#filename').val();
		//console.log(filename);
		problem = $('#problem').val();
		option1 = $('#option1').val();
		option2 = $('#option2').val();
		option3 = $('#option3').val();
		option4 = $('#option4').val();
		answer = $('#answer').val();
		subject = $('#subject').val();
		description = $('#description').val();
		$.ajax({
			url : '../../back/profile/add_question.php',
			type : 'post',
			data : ({'chek' : 'add_question', 'problem':problem, 'option1':option1,'option2':option2,'option3':option3,'option4':option4,'answer':answer,'subject':subject,'description':description,'filename':filename}),
			success : function(response){
				//console.log(response);
				location.reload();
			}
		});
	}
	$.ajax({
		url : '../../back/profile/add_question.php',
		type : 'post',
		data : ({'chek': 'get_subjects'}),
		success : function(response){
			//console.log(response);
			$('#subject').append(response);
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