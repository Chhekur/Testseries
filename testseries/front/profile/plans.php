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
						<div class = "profile-box" id = "total_user_count"><span style="font-size: 30px;">&#8377;10</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;1 day</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "10" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div>	
						<div class = "profile-box" id = "total_user_count"><span style="font-size: 30px;">&#8377;20</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;15 days</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "20" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div>	
						<div class = "profile-box" id = "total_user_count"><span style="font-size: 30px;">&#8377;30</span><br><br><h1>Unlimited Access</h1><h1>Validity &nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;30 days</h1><br><form action = "/profile/recharge" method = "post"><input type = "number" value = "30" name = "price" style="display: none;"><input type = "text" name = "chek" value="get_payment_options" style = "display: none;"><button class = "button is-danger" style = "height:20px;padding-top:0px;font-size:12px;">Purchase</button></form>
						</div>					
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	$(".button-collapse").sideNav();
     $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
</script>