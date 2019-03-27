<!DOCTYPE html>
<html>
<head>
	<title>GAMES</title>

	<style type="text/css">
		
		body
		{
			font-family: "Lato", sans-serif;
  			background-color: cyan;
  			font-family: Arial, Helvetica, sans-serif;
		}

		#open a 
		{
		  position: absolute;
		  left: -120px;
		  transition: 0.3s;
		  padding: 15px;
		  width: 100px;
		  text-decoration: none;
		  font-size: 20px;
		  color: white;
		  border-radius: 0 5px 5px 0;
		}

		#open a:hover 
		{
		  left: 0;
		}

		#Settings
		{
		  top: 20px;
		  background-color: #4CAF50;
		}

		#logout 
		{
		  top: 80px;
		  background-color: #2196F3;
		}

		.design
		{
			width: 120px;
			height: 100px;
			border: 10px;
			padding: 10px 18px;
		}

	</style>

</head>
<body background="games1.jpg">

	<?php

	session_start();

	$username = $_SESSION['username'];

	?>

	<script type="text/javascript">
		
		function puzzle()
		{
			window.location = "puzzle.php";
		}

		function snake()
		{
			window.location = "snake.php"
		}

		function tictactoe()
		{
			window.location = "tic tac toe.html";
		}

		function name1()
		{									
 			document.getElementById("demo").value= " <?php echo $username ?> ";
		}

		

	</script>

<center> <h1> <font color="white"> WELCOME TO THE FREE GAMES ONLINE </font> </h1> </center>


<table align="right" rows=2 columns=2>
	<tr>
		<td>
			  <p align="right"><img src="img_avatar.png" alt="Avatar" style="width:70px;height:70px;"> </p>
			  <h4> <p align="right" > <font color="white">USERNAME: </font><INPUT TYPE = "BUTTON" VALUE="REFRESH" class="button" name="uname" onclick="name1()" id="demo"> 
			</h4> </p>
		</td>

		<td>
			
		</td>
	</tr>
</table>


<div id="open" class="open">
  <a href="#" id="Settings"> Settings</a>
  <a href="#" id="logout">Log out</a>

  <!-- <center> -->
	<table rows=2 columns=2>

		<tr>
			<td> <h3> <font color="white"> BRAIN GAMES </font> </h3>  </td>
			<td>  </td>
		</tr>

		<tr>
			<td> <img src="puzzle.jpg" onclick="puzzle()" class="design"> </td>
			<td> <img src="tic tac toe.png" onclick="tictactoe()" class="design"> </td>
		</tr>
		
	</table>

	<table>
		
		<tr>
			<td> <h3> <font color="white"> FUN GAMES </font> </h3>  </td>
			<td>  </td>
		</tr>

		<tr>
			<td> <img src="snake.jpg" onclick="snake()" class="design"> </td>
		</tr>

	</table>
<!-- </center> -->

</div>

</body>
</html>