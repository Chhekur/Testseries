<?php
session_start();
if(isset($_SESSION['usr_id']) != ""){
	header('Location: /');
}
include_once "../back/check_user_login.php";
?>
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
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" name = "signup" method="post" action="/back/signup.php">
					<span class="login100-form-title p-b-48" style = "font-size:20px;color:green;">
						Online Test Series
					</span><br>
					<div class="wrap-input100 validate-input" data-validate = "Name must contain only letters">
						<input class="input100" type="text" name="name">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Enter valid mobile no.">
						<input class="input100" type="text" name="mobile">
						<span class="focus-input100" data-placeholder="Mobile no."></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="refral" value = "<?php if(isset($_GET['referral'])){echo $_GET['referral'];}?>">
						<span class="focus-input100" data-placeholder="Referral Code (optional)"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign up
							</button>
						</div>
					</div>
					<center><br><span id = "error" style="display:none;color:red;font-size:14px;border:2px red solid;border-radius:2px;padding:5px;"></span></center>

					<center><div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="/login">
							Login
						</a>
					</div></center>
				</form>
			</div>
		</div>
	</div>

<script>
	$('.input100').click(function(){
		document.getElementById('error').innerHTML = "";
		document.getElementById('error').style.display = "none";
	});
	$('form[name=signup]').submit(function(e){
        e.preventDefault();
        $.ajax({
            type:this.method,
            url:this.action,
            data:$(this).serialize(),
            success:function(response){
            	if (response != ""){
	                document.getElementById('error').innerHTML = response;
	                document.getElementById('error').style.display = 'block';
	            }
            }
        });
    });

</script>

<script src="/../js/login.js"></script>
</body>
<?php include_once "footer.php"; ?>
</html>