<?php
require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'HOSTNAME';
    $mail->SMTPAuth = true;
    $mail->Username = 'YOUR EMAIL';
    $mail->Password = 'YOUR PASSWORD';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('YOUR EMAIL', 'YOUR NAME');
    $mail->addAddress('YOUR EMAIL');
    $mail->addReplyTo('YOUR EMAIL', 'YOUE NAME');
    $mail->isHTML(true);
    $mail->Subject = 'Password reset';
    $mail->Body    = "Hello";
    $mail->AltBody = 'dsgsd';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
 
  
?>