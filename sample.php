<?php
include 'index.php';
//session_start();

$db = mysqli_connect("localhost","root","","project");

$ran1=rand(0,10);
          $ran2=rand(0,10);
          $ran3=rand(0,10);
          $ran4=rand(0,10);
          $ran5=rand(0,10);
          $ran6=rand(0,10);

          $otpverify = $ran1."".$ran2."".$ran3."".$ran4."".$ran5."".$ran6;

          $mailto = "ghvghv99@gmail.com";
          $mailSub = "VERIFICATION";
          $mailMsg = "THE PASSWORD IS ".$otpverify;
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

          $mail->send();


/*echo '

	<!DOCTYPE html>
	<html>
	<body>

	<center >

	<div>  
	<dialog id="myFirstDialog" style="width:100%;height:100%;background-color:#F4FFEF;border:1px dotted black;">  
	<h1> MAIL VERIFICATION </h1> 
	<p><q>PLEASE ENTER THE OTP <input type="text" name="pass"> 
	</q></p>  
	<button id="hide">SUBMIT</button>  
	<h4> NOTE : <u> <font color="red"> if you entered wrong OTP then you must fill the form once again please type correct OTP </h4> 
	</dialog>  
	<!-- <button id="show">Show Dialog</button>  --> 
	</div>  

';

echo "<script language='javascript'>";
echo "
	
	(function() {    
	    var dialog = document.getElementById('myFirstDialog');    
	    //document.getElementById('').onclick = function() {    
	        dialog.show();    
	    //};    
	    document.getElementById('hide').onclick = function() 
	    {    
	        dialog.close();    
	    };    
	})();   
";
echo '</script>';

echo '</center>
	  </body>
	  </html> ';*/

	  if(isset($_POST['hide']))
          {
            /*header("location: errormail.html");*/

            $otp = mysql_real_escape_string($_POST['otp']);

         
            //$otpverify = $ran1."".$ran2."".$ran3."".$ran4."".$ran5."".$ran6;

            if(!strcmp($otp,$otpverify))
            {
            	echo '<script language=javascript>';
	          	echo 'alert("PLEASE ENTER THE CORRECT OTP")';
	          	echo '</script>';
            }

            else
	          {
	            $qur = "SELECT count(id) as total from signup";
	            $result = mysqli_query($db , $qur);
	            $values = mysqli_fetch_assoc($result);
	            $c = $values['total']; 
	            

	            $sql = "INSERT INTO signup values ('$name','$id','$gmail','$mobile','$uname','$pass')";
	            mysqli_query($db , $sql);

	            $puzzle = "INSERT INTO puzzle values ('$uname',0)";
	            mysqli_query($db , $puzzle);


	            $qur1 = "SELECT count(id) as total from signup";
	            $result1 = mysqli_query($db , $qur1);
	            $values1 = mysqli_fetch_assoc($result1);
	            $a = $values1['total']; 


	            $_SESSION['message'] = "YOUR LOGGED IN";
	            $_SESSION['uname'] = "$uname";
	            $_SESSION['pass'] = "$pass";

	            if($c != $a)
	            {
	              $_SESSION['username'] = $uname;
	              header("location: games.php");  
	            }

	            else
	            {
	              echo '<script language="javascript">';
	              echo 'alert("PLEASE ENTER VALID ID , USERNAME AND MOBILE NUMBER")';
	              echo '</script>';
	            }
	          }
         }

?>

<!DOCTYPE html>
<html>
<body>

	<form action="sample.php" method="post">

	<center >

	<div>  
	<dialog id="myFirstDialog" style="width:50%;background-color:#F4FFEF;border:1px dotted black;">  
	<p><q>PLEASE ENTER THE OTP FROM GMAIL  <input type="text" name="otp"> 
	</q></p>  
	<button name="hide" id="hide">SUBMIT</button>  
	</dialog>  
	<!-- <button id="show">Show Dialog</button>  --> 
	</div>  
	 
	<script type="text/JavaScript">  
	(function() {    
	    var dialog = document.getElementById('myFirstDialog');    
	    //document.getElementById('').onclick = function() {    
	        dialog.show();    
	    //};    
	    document.getElementById('hide').onclick = function() 
	    {    
	        dialog.close();    
	    };    
	})();   
	</script>  

	</center>

</form>

</body>
</html>