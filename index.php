<?php

session_start();

$db = mysqli_connect("localhost","root","","project");

if(isset($_POST['submit']))
{
	  $name = mysql_real_escape_string($_POST['name']);
	  $id = mysql_real_escape_string($_POST['id']);
	  $gmail = mysql_real_escape_string($_POST['gmail']);
	  $mobile = mysql_real_escape_string($_POST['mobile']);
	  $uname = mysql_real_escape_string($_POST['uname']);
	  $pass = mysql_real_escape_string($_POST['pass']);
	  $cpass = mysql_real_escape_string($_POST['cpass']);

    $lengthpass = strlen($pass);
    $lengthcpass = strlen($cpass);

    $ucl = preg_match('/[A-Z]/', $pass); // Uppercase Letter
    $lcl = preg_match('/[a-z]/', $pass); // Lowercase Letter
    $dig = preg_match('/\d/', $pass); // Numeral

    if ((!$ucl || !$lcl || !$dig) || ( $lengthpass <8 || $lengthcpass <8 ))
    {
          echo '<script language=javascript>';
          echo 'alert("PLEASE ENTER THE PASSWORD WITH MINIMUM OF 8 CHARACTERS WITH ONE UPPER/LOWER CASE AND A DIGIT")';
          echo '</script>';
    }

    else
    {
        if($pass == $cpass)
       {
          $pass = ($cpass); //hash the password befor storing for security purposes

          /*$ran1=rand(0,10);
          $ran2=rand(0,10);
          $ran3=rand(0,10);
          $ran4=rand(0,10);
          $ran5=rand(0,10);
          $ran6=rand(0,10);*/

         

          $mailto = $gmail;
          $mailSub = "VERIFICATION";
          $mailMsg = "MAIL IS VERIFIED";
          //$mailMsg = "THE PASSWORD IS ".$ran1."".$ran2."".$ran3."".$ran4."".$ran5."".$ran6;
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

      else
      {
        /*$_SESSION['message'] = "THE TWO PASSWORDS ARE WRONG";*/
          header("location: errorpass.html");
      }
    }
}


if(isset($_POST['forget']))
{

	$errors = array();

	$uname = mysql_real_escape_string($_POST['loginname']);

	if($uname != NULL)
	{	
		$qur = "SELECT gmail as mail , pass as password FROM signup WHERE uname = '$uname' ";

		//$pass = "SELECT pass FROM signup WHERE uname = 'harshacse' ";

		$result = mysqli_query($db , $qur);
		$values = mysqli_fetch_assoc($result);

		$gmail = $values['mail'];
		$password = $values['password'];



			$mailto = $gmail;
		    $mailSub = "verfication";
		    $mailMsg = $password;
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
		    	echo '<script language="javascript">';
  				echo 'alert("YOUR USERNAME IS WRONG PLEASE ENTER CORRECT USERNAME")';
  				echo '</script>';

				/*array_push($errors,"PASSWORD IS NOT SENT TO YOUR MAIL ADDRESS");*/

		    }

		    else
		    {
		    	echo '<script language="javascript">';
  				echo 'alert("PASSWORD IS SENT TO YOUR MAIL ADDRESS")';
  				echo '</script>';

				/*array_push($errors, "PASSWORD IS SENT TO YOUR MAIL ADDRESS");*/
		    }
		
	}

	else
	{
		echo '<script language="javascript">';
		echo 'alert("PLEASE ENTER THE USERNAME")';
		echo '</script>';
	}
}

if (isset($_POST['loginsubmit'])) 
{
	$user = $_REQUEST['loginname'];
	$pass = $_REQUEST['psw'];

	$query = mysqli_query($db,"select * from signup where uname='$user' and pass='$pass'");

  //$result = mysqli_query($db,"select uname from signup where uname='$user' and pass='$pass'");

	$rowcount = mysqli_fetch_assoc($query);

	if((int)$rowcount == 1)
  {
    $_SESSION['username'] = $user;
		header("location: games.php"); 
  }

	else
	{

		echo '<script language="javascript">';
		echo 'alert("WRONG USERNAME AND PASSWORD")';
		echo '</script>';
	}
}

?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body 
{
  font-family: "Lato", sans-serif;
  /*background-color: cyan;*/
  background-image: "games.jpg";

}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


/*LOGIN HTML STYLE STARTING  CODE ------------------------------------------*/

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.forgetpass {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}


/*LOGIN HTML STYLE ENDING CODE ------------------------------------------*/





</style>
</head>
<body background="games.jpg">

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">ABOUT</a>
  <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">LOGIN</a>
  <a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGNUP</a>
  <a href="#" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">CONTACT</a>
</div>

<!-- THIS CODE IS FOR LOGIN ZOOM STARTING CODE -------------------->

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="loginname" >

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" >
        
      <button type="submit" name="loginsubmit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <button type="submit"  class="forgetpass" name="forget">FORGET PASSWORD</button>
      <!-- <span class="psw" name="forget">Forgot <a href="forgetpass.php">password?</a></span> -->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- LOGIN ZOOM HTML STYLE ENDING CODE ------------------------------------------ -->




<!-- SIGNUP ZOOM HTML STYLE STARTING CODE ------------------------------------------ -->


<div id="id02" class="modal">
  
  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">

        <CENTER> <h1>FILL THE DETAILS FOR REGISTERATION</h1> </CENTER>

        <b>
          <label>NAME:</label>
          <input type = "text" size=25 name="name" id="name"placeholder="Enter your name" required>
        

        
          <label>ID:</label>
          <input type ="text" size=25 name="id" id="ID"placeholder="Enter your id" required>
        

        
          <label>GMAIL:</label>
          <input type ="text" size=25 name="gmail" id="gmail"placeholder="Enter your gmail" required>
        

        
          <label>MOBILE NO:</label>
          <input type ="text" size=25 name="mobile" id="mobile"placeholder="Enter your mobile no" required>
        

        
          <label>USERNAME:</label>
          <input type ="text" size=25 name="uname" id="username"placeholder="Enter username" required>
        

        
          <label>PASSWORD:</label>
          <input type ="password" size=25 name="pass" id="password"placeholder="Enter password min 8 characters with one upper/lower case and a digit" required>
        
          <label>CONFIRM PASSWORD:</label>
          <input type ="password" size=25 name="cpass" id="password"placeholder="Confirm password" required>
        
        </b>

        <table rows=1 columns=2>
        <tr>
          <td>  <button type="submit" name="submit" >SUBMIT</button> </td>
          <td>  <button type="reset" name="reset">RESET</button> </td>
        </tr>
        </table>


    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
  </form>
</div>

<div id="id03" class="modal">
	
	<form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">

    	<font color="red"> CONTACT THE EDITORS : verfication.your.mail@gmail.com </font> <BR>
    	<font color="red">CONTACT NUMBERS : 8886193698 </font>


    </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>




<!-- SIGNUP ZOOM HTML STYLE ENDING CODE ------------------------------------------ -->


<div id="main">

  <h1>
    <center> <font color="white"> WELCOME TO OUR FUN GAMES WEBSITE </font></center>
  </h1>

  <h3> <marquee behavior="alternate" direction="left" scrollamount="5"> <font color="white"> PLAY FREE ONLINE GAMES AND ENJOY A LOT  </font> </marquee> </h3>

  <hr>
  
 <font color="white"> <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU </span> </font>


</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>
</html> 
