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
	<title>Test Series</title>
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
			<div id = "left_sidebar" class = "left_sidebar" style="overflow: auto;"><br><center>
				<?php echo $response;?></center>
			</div>
			<!-- <div class = "right">
				<center>
					<div id = "right_sidebar" class = "right_sidebar"></div>
				</center>
			</div> -->
			<div class = "right">
			<center>
			<div id = "right_sidebar" class = "right_sidebar"><br><br>
				<h1>WELCOME</h1><br>
			<br><br>
			<!-- <h3 style = "color:red;">Your Account Is Run Out Of Balance</h3><br>
			<h3>Please Recharge</h3>
			<div class = "profile-box"><span style="font-size: 30px;">&#8377;100</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;4 Months</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "100" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div>	
						<div class = "profile-box"><span style="font-size: 30px;">&#8377;30</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;15 days</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "30" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div>	
						<div class = "profile-box"><span style="font-size: 30px;">&#8377;50</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;30 days</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "50" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div><br><br><br><br> -->
			</div></center></div>
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