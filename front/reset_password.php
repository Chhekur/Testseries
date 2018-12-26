<?php
session_start();
if(isset($_SESSION['usr_id']) != ""){
	header('Location: /');
}
include_once "../back/check_user_login.php";
include_once "../back/confirmcode.php";
include_once "../back/confirmid.php";
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
		<?php if ($confirmcode == $_GET['code'] && $confirmid == $_GET['id']) {?>
			<div class="wrap-login100">
				<form class="login100-form validate-form" name = "reset_password" method="post" action="/back/reset_password.php">
					<span class="login100-form-title p-b-48" style = "font-size:20px;color:green;">
						Online Test Series
					</span><br>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
						</span>
						<input type = "text" name = "id" value = "<?php echo $_GET['id'];?>" style = "display:none;">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="New Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Reset
							</button>
						</div>
					</div>
					<center><br><span id = "error" style="display:none;color:red;font-size:14px;border:2px red solid;border-radius:2px;padding:5px;"></span></center>
				</form>
			</div>
			<?php } else{ if($confirmid != $id){ ?>
	      <h4>You are trying to manipulate url.</h4>
	      <?php } else{?>
	      <h4>Your password reset link has expired.</h4>
	      <?php } }?>
		</div>
	</div>

<script>
	$('.input100').click(function(){
		document.getElementById('error').innerHTML = "";
		document.getElementById('error').style.display = "none";
	});
	$('form[name=reset_password]').submit(function(e){
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
</html>