<?php
include_once "dbconnect.php";
include_once 'generate_otp.php';
require 'phpmailer/PHPMailerAutoload.php';
session_start();
if(isset($_SESSION['usr_id']) != ""){
	header('Location: /');
}
$email = $_POST['email'];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    exit();
  }
$result = mysqli_query($con, "SELECT * from users where email = '{$email}'");
	if($row = mysqli_fetch_array($result)){
			$tempid = $row['id'];
		    $tempname = $row['name'];
		    $mail = new PHPMailer;
		    $mail->isSMTP();                                     
		    $mail->Host = "smtp.gmail.com";   
		    $mail->SMTPAuth = true;                              
		    $mail->Username = 'dg9826440856@gmail.com';                
		    $mail->Password = '9826440856';                
		    $mail->SMTPSecure = 'ssl';
		    $mail->Port = 465; 
		    $mail->setFrom('support@deepgroups.com', 'Deep Groups');
		    $mail->addAddress($email);
		    $mail->addReplyTo('support@deepgroups.com', 'Deep Groups');
		    $mail->isHTML(true);
		    $mail->Subject = 'Password reset';
		    $mail->Body    = "Hello {$tempname} <br><br> Someone has requested a link to change your password. You can do this through the link below.<br> <br><a href='http://testseries.deepgroups.com/reset?id={$tempid}&code={$code}'>Change my password</a><br><br>If you didn't request this, please ignore this email.<br><br>Your password won't change until you access the link above and create a new one.<br><br>";
		    $mail->AltBody = '';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		    exit('faild');
		} else {
		    //echo 'Message has been sent';
		    $myfile = fopen("confirmid.php","w");
		    $txt = "<?php\n $"."confirmid = {$tempid};\n?>";
		    fwrite($myfile, $txt);
		    fclose($myfile);
		    exit('success');
		}
	}else{
		exit("Invalid email");
	}
?>