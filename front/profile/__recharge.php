<?php
session_start();
if(isset($_SESSION['usr_id']) == ""){
	header('Location: /login');
}
include_once "../../back/profile/recharge.php";
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
						<?php echo $response;?>
					</div>
				</center>
			</div>
	</section>
</body>
</html>
<script>
	function pay(price, method){
		//console.log('hello');
		data = '';
		switch(method){
			case 'paytm':
				data = ({'chek':'paytm'});
				break;
			case 'bhim':
				data = ({'chek':'bhim'});
				break;
			case 'tej':
				data = ({'chek':'tej'});
				break;
			case 'imps':
				data = ({'chek':'imps'});
				break;
			case 'upi':
				data = ({'chek':'upi'});
				break;
		}
		$.ajax({
			url : '../../back/profile/recharge.php',
			type : 'post',
			data : data,
			success : function(response){
				$('#right_sidebar').html(response);
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