<?php
session_start();
if(isset($_SESSION['usr_id']) == ""){
	header('Location: /login');
}
include_once "../back/check_user_login.php";
//echo($_COOKIE['login']);
?>

<?php include_once "../back/dashboard_left.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Login V2</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/../../css/bulma.css">
	<link rel="stylesheet" type="text/css" href="/../css/main.css">
	<link rel="stylesheet" type="text/css" href="/../css/login.css">
	<script src="/../js/jquery-3.2.1.min.js"></script>
</head>
<style>
	@media screen and (min-width: 640px){
		html{
			background-color: #f7f7f7;
		}
	}
</style>
<body>
	<?php include_once "navbar.php";?>
	<section>
		<?php if($_SESSION['validity'] > 0) {?>
			<div id = "left_sidebar" class = "left_sidebar" style="overflow: auto;"><br><center>
				<?php echo $response;?></center>
			</div>
			<div class = "right">
				<center>
					<div id = "right_sidebar" class = "right_sidebar"></div>
				</center>
			</div>
		<?php } else {?>
			<div id = "left_sidebar" class = "left_sidebar" style="overflow: auto;"><br><center>
				<?php echo $demo;?></center>
			</div>
			<div class = "right">
			<center><div id = "right_sidebar" class = "right_sidebar"><h3>Your Account Is Run Out Of Balance</h3></div></center>
			</div>
		<?php }?>
	</section>
</body>
</html>
<script>
	var acc = document.getElementsByClassName("accordion");
	var i;
	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var panel = this.nextElementSibling;
	    if (panel.style.maxHeight){
	      panel.style.maxHeight = null;
	    } else {
	      panel.style.maxHeight = panel.scrollHeight + "px";
	    } 
	  });
	}
	function right_side(name,id){
		$.ajax({
			type : 'POST',
			url : '../back/dashboard_right.php',
			data : ({'chek':'right_side','quiz_name':name,'quiz_id':id}),
			success:function(response){
				$('#right_sidebar').html(response);
			}
		});
	}
	function start(quiz){
		//console.log(quiz);
	}
	
</script>