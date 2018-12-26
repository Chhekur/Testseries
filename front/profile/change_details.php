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
	<link rel="stylesheet" type="text/css" href="/../../css/login.css">
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
				<center>
					<div id = "right_sidebar" style="margin-top: 60px;">
						<div class="wrap-login100" style="width: 350px; padding-top:40px;text-align: left;">
							<form class="login100-form validate-form" name = "changedetails" method = "post" action = "../../back/profile/change_details.php">
								<center><span >
									Change Details
								</span></center><br>
								<div class="wrap-input100 validate-input" >
									<input class="input100" type="text" name="names" value = "<?php echo $_SESSION['usr_name'];?>">
									<span class="focus-input100" data-placeholder="Name"></span>
								</div>

								<div class="wrap-input100 validate-input">
									<input class="input100" type="text" name="emails" value = "<?php echo $_SESSION['usr_email'];?>">
									<span class="focus-input100" data-placeholder="Email"></span>
								</div>
								<div class="container-login100-form-btn">
									<div class="wrap-login100-form-btn">
										<div class="login100-form-bgbtn"></div>
										<button class="login100-form-btn">
											Change
										</button>
									</div>
								</div>
								<center><br><span id = "error" style="display:none;color:red;font-size:14px;border:2px red solid;border-radius:2px;padding:5px;"></span></center>
							</form>
						</div>
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	$('.input100').click(function(){
		document.getElementById('error').innerHTML = "";
		document.getElementById('error').style.display = "none";
	});
	$('form[name=changedetails]').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : this.action,
			type : this.method,
			data: $(this).serialize(),
			success : function(response){
				document.getElementById('error').innerHTML = response;
	            document.getElementById('error').style.display = 'block';
			}
		})
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