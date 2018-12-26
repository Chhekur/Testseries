<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Login V2</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
	<link rel="stylesheet" type="text/css" href="/../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/../fonts/iconic/css/material-design-iconic-font.min.css">
	<!--<link rel="stylesheet" type="text/css" href="/../css/util.css">-->
	<link rel="stylesheet" type="text/css" href="/../css/login.css">
	<script src="/../js/jquery-3.2.1.min.js"></script>
	
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100"><center>
			<h3>Payment Id: <?php echo $_GET['payment_id'];?></h3>
			<span><h1>Your payment has been successful</h1><br>
				<h2>Just <a href='/logout'>relogin </a>your account and enjoy</h2>
			</span></center>
		</div>
	</div>
</body>
</html>