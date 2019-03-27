<?php

		$ran1=rand(0,10);
          $ran2=rand(0,10);
          $ran3=rand(0,10);
          $ran4=rand(0,10);
          $ran5=rand(0,10);
          $ran6=rand(0,10);

          $mailto = "ghvghv99@gmail.com";
          $mailSub = "VERIFICATION";
          $mailMsg = "THE PASSWORD IS ".$ran1."".$ran2."".$ran3."".$ran4."".$ran5."".$ran6;
          require 'PHPMailer-master/PHPMailerAutoload.php';
          $mail = new PHPMailer();
          $mail ->IsSmtp();
          $mail ->SMTPDebug = 0;
          $mail ->SMTPAuth = true;
          $mail ->SMTPSecure = 'tls';//'ssl';
          $mail ->SMTPAutoTLS = false;
          $mail ->Host = "smtp.gmail.com";
          $mail ->Port = 587;//465; // or 587
          $mail ->IsHTML(true);
          $mail ->Username = "verfication.your.mail@gmail.com";
          $mail ->Password = "VerifyMail";
          $mail ->SetFrom("verfication.your.mail@gmail.com");
          $mail ->Subject = $mailSub;
          $mail ->Body = $mailMsg;
          $mail ->AddAddress($mailto);

          if(!$mail->Send())
          {
            header("location: errormail.html");
          }

          else
          {
          	header("location: errorpass.html");
               //$otpverify = $ran1."".$ran2."".$ran3."".$ran4."".$ran5."".$ran6;
          }

?>