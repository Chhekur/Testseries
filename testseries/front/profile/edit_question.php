<?php
session_start();
if(isset($_SESSION['usr_id']) == ""){
	header('Location: /login');
}
include_once "../../back/profile/edit_question.php";
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
					<h2 style="font-size: 24px;">Edit Question</h2>
					<div id = "right_sidebar" class = "profile-right-sidebar">
						<textarea style="padding:10px;width: 100%; height:100px; word-wrap: break-word;font-size:18px;" placeholder="Problem Statement" id = "problem" onkeyup="preview()"><?php echo $statement;?></textarea><br>Preview: <br><div id = "preview"></div><br><br>
						<input style="font-size:18px;" type="text" id="option1" placeholder="Option 1" value = "<?php echo $option1;?>">&nbsp;&nbsp;
						<input style="font-size:18px;" type="text" id="option2" placeholder="Option 2" value = "<?php echo $option2;?>"><br><br>
						<input style="font-size:18px;" type="text" id="option3" placeholder="Option 3" value = "<?php echo $option3;?>">&nbsp;&nbsp;
						<input style="font-size:18px;" type="text" id="option4" placeholder="Option 4" value = "<?php echo $option4;?>"><br><br>
						<input style="font-size:18px;" type="text" id="answer" placeholder="Answer" value = "<?php echo $answer;?>">&nbsp;&nbsp;<br><br><textarea style="padding:10px;width: 100%; height:100px; word-wrap: break-word;font-size:18px;" placeholder="Description" id = "description"><?php echo $description;?></textarea><br>
						<!-- <select style="font-size:18px;" id = "subject"></select> --><br>
						<button onclick = "save('<?php echo $path;?>')" class = "button is-link" style='height:25px;padding-top:0px;font-size:12px;'>Save</button>
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	preview();
	function preview(){
		$('#preview').html($('#problem').val());
	}
	function save(path){
		//console.log("hello");
		problem = $('#problem').val();
		option1 = $('#option1').val();
		option2 = $('#option2').val();
		option3 = $('#option3').val();
		option4 = $('#option4').val();
		answer = $('#answer').val();
		description = $('#description').val();
		$.ajax({
			url : '../../back/profile/edit_question.php',
			type : 'post',
			data : ({'chek' : 'save_question', 'problem':problem, 'option1':option1,'option2':option2,'option3':option3,'option4':option4,'answer':answer,'path':path,'description':description}),
			success : function(response){
				//console.log(response);
				location.reload();
			}
		});
	}

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