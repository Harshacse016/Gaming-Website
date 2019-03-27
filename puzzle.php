<?php
  
    $moves = 0;
    session_start();

?>

<!DOCTYPE html>
<HTML>
<head>

  <title>PUZZLE GAME</title>

<style>

body
  {
    background-color: skyblue;
  }

.button {
  background-color: #4CAF50;
  border: none;
  color: black;
  padding: 35px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 35px;
  margin: 4px 2px;
  cursor: pointer;
}

.look
  {
      width: 5%;
      border: none;
      background-color: #4CAF50;
      color: white;
      padding: 8px 30px;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
  }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

var moves=0;
var moves1;

function random()
{

  var ran=Math.floor((Math.random() * 10));

  if(ran==0)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value=2;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=7;
  		document.getElementById("demo5").value="  ";
  		document.getElementById("demo6").value=8;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=5;
  		document.getElementById("demo9").value=4;
  }

  if(ran==1)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value=3;
  		document.getElementById("demo3").value=2;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value="  ";
  		document.getElementById("demo6").value=5;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value=8;
  }

  if(ran==2)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=8;
  		document.getElementById("demo2").value=6;
  		document.getElementById("demo3").value=4;
  		document.getElementById("demo4").value=2;
  		document.getElementById("demo5").value=1;
  		document.getElementById("demo6").value=3;
  		document.getElementById("demo7").value=5;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value="  ";
  }

  if(ran==3)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value=2;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value=5;
  		document.getElementById("demo6").value=7;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value="  ";
  		document.getElementById("demo9").value=8;
  }

  if(ran==4)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value=8;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value="  ";
  		document.getElementById("demo6").value=5;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value=2;
  }

  if(ran==5)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=8;
  		document.getElementById("demo2").value=7;
  		document.getElementById("demo3").value=6;
  		document.getElementById("demo4").value=5;
  		document.getElementById("demo5").value="  ";
  		document.getElementById("demo6").value=4;
  		document.getElementById("demo7").value=3;
  		document.getElementById("demo8").value=2;
  		document.getElementById("demo9").value=1;
  }

  if(ran==6)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value="  ";
  		document.getElementById("demo2").value=2;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value=1;
  		document.getElementById("demo6").value=5;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value=8;
  }

  if(ran==7)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value="  ";
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value=2;
  		document.getElementById("demo6").value=5;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value=8;
  }

  if(ran==8)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=1;
  		document.getElementById("demo2").value=2;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value=5;
  		document.getElementById("demo6").value=6;
  		document.getElementById("demo7").value=8;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value="  ";
  }

  if(ran==9)
  {
  	moves=0;
  		
  		document.getElementById("demo1").value=8;
  		document.getElementById("demo2").value=5;
  		document.getElementById("demo3").value=3;
  		document.getElementById("demo4").value=4;
  		document.getElementById("demo5").value="  ";
  		document.getElementById("demo6").value=2;
  		document.getElementById("demo7").value=6;
  		document.getElementById("demo8").value=7;
  		document.getElementById("demo9").value=1;
  }

}


function myFunction1() 
{
  var val2 = document.getElementById("demo2").value;
  var val4 = document.getElementById("demo4").value;
  
  var val = document.getElementById("demo1").value;
  
  if(val2 == "  ")
  {
  	document.getElementById("demo2").value=val;
  	document.getElementById("demo1").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val4 == "  ")
  {
  	document.getElementById("demo4").value=val;
  	document.getElementById("demo1").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
      
}

function myFunction2() 
{
  var val1 = document.getElementById("demo1").value;
  var val3 = document.getElementById("demo3").value;
  var val5 = document.getElementById("demo5").value;
  
  var val = document.getElementById("demo2").value;
  
  if(val1 == "  ")
  {
  	document.getElementById("demo1").value=val;
  	document.getElementById("demo2").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val5 == "  ")
  {
  	document.getElementById("demo5").value=val;
  	document.getElementById("demo2").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val3 == "  ")
  {
  	document.getElementById("demo3").value=val;
  	document.getElementById("demo2").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function myFunction3() 
{
  var val2 = document.getElementById("demo2").value;
  var val6 = document.getElementById("demo6").value;
  
  var val = document.getElementById("demo3").value;
  
  if(val2 == "  ")
  {
  	document.getElementById("demo2").value=val;
  	document.getElementById("demo3").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val6 == "  ")
  {
  	document.getElementById("demo6").value=val;
  	document.getElementById("demo3").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function myFunction4() 
{
  var val7 = document.getElementById("demo7").value;
  var val5 = document.getElementById("demo5").value;
  var val1 = document.getElementById("demo1").value;
  
  var val = document.getElementById("demo4").value;
  
  if(val1 == "  ")
  {
  	document.getElementById("demo1").value=val;
  	document.getElementById("demo4").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val5 == "  ")
  {
  	document.getElementById("demo5").value=val;
  	document.getElementById("demo4").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val7 == "  ")
  {
  	document.getElementById("demo7").value=val;
  	document.getElementById("demo4").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function myFunction5() 
{
  var val2 = document.getElementById("demo2").value;
  var val4 = document.getElementById("demo4").value;
  var val6 = document.getElementById("demo6").value;
  var val8 = document.getElementById("demo8").value;
  
  var val = document.getElementById("demo5").value;
  
  if(val2 == "  ")
  {
  	document.getElementById("demo2").value=val;
  	document.getElementById("demo5").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val4 == "  ")
  {
  	document.getElementById("demo4").value=val;
  	document.getElementById("demo5").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val6 == "  ")
  {
  	document.getElementById("demo6").value=val;
  	document.getElementById("demo5").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val8 == "  ")
  {
  	document.getElementById("demo8").value=val;
  	document.getElementById("demo5").value="  ";
    moves++;    
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function myFunction6() 
{
  var val3 = document.getElementById("demo3").value;
  var val5 = document.getElementById("demo5").value;
  var val9 = document.getElementById("demo9").value;
  
  var val = document.getElementById("demo6").value;
  
  if(val9 == "  ")
  {
  	document.getElementById("demo9").value=val;
  	document.getElementById("demo6").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val5 == "  ")
  {
  	document.getElementById("demo5").value=val;
  	document.getElementById("demo6").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val3 == "  ")
  {
  	document.getElementById("demo3").value=val;
  	document.getElementById("demo6").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function myFunction7() 
{
  var val4 = document.getElementById("demo4").value;
  var val8 = document.getElementById("demo8").value;
  
  var val = document.getElementById("demo7").value;
  
  if(val4 == "  ")
  {
  	document.getElementById("demo4").value=val;
  	document.getElementById("demo7").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val8 == "  ")
  {
  	document.getElementById("demo8").value=val;
  	document.getElementById("demo7").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}


function myFunction8() 
{
  var val7 = document.getElementById("demo7").value;
  var val5 = document.getElementById("demo5").value;
  var val9 = document.getElementById("demo9").value;
  
  var val = document.getElementById("demo8").value;
  
  if(val9 == "  ")
  {
  	document.getElementById("demo9").value=val;
  	document.getElementById("demo8").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val5 == "  ")
  {
  	document.getElementById("demo5").value=val;
  	document.getElementById("demo8").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val7 == "  ")
  {
  	document.getElementById("demo7").value=val;
  	document.getElementById("demo8").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;

  check();
}

function myFunction9() 
{
  var val8 = document.getElementById("demo8").value;
  var val6 = document.getElementById("demo6").value;
  
  var val = document.getElementById("demo9").value;
 
  if(val8 == "  ")
  {
  	document.getElementById("demo8").value=val;
  	document.getElementById("demo9").value="  ";
    moves++;
   moves1 = '<?php echo $moves+=1; ?>';
  }
  
  if(val6 == "  ")
  {
  	document.getElementById("demo6").value=val;
  	document.getElementById("demo9").value="  ";
    moves++;
    moves1 = '<?php echo $moves+=1; ?>';
  }

  document.getElementById("moves").value=moves;
  
  check();
}

function check()
{
   var val1 = document.getElementById("demo1").value;
   var val2 = document.getElementById("demo2").value;
   var val3 = document.getElementById("demo3").value;
   var val4 = document.getElementById("demo4").value;
   var val5 = document.getElementById("demo5").value;
   var val6 = document.getElementById("demo6").value;
   var val7 = document.getElementById("demo7").value;
   var val8 = document.getElementById("demo8").value;
   var val9 = document.getElementById("demo9").value;

   var getmoves = document.getElementById("bmoves").value;

   
   if( val1 == 1 && val2 == 2 && val3 == 3 && val4 == 4 && val5 == 5 && val6 == 6 && val7 == 7 && val8 == 8 && val9 == "  ")
	{

    /*$db = mysqli_connect("localhost","root","","project");

    $username = $_SESSION['username'];

    $qur = "SELECT moves as score from puzzle where uname='$username'";
    $result = mysqli_query($db , $qur);
    $values = mysqli_fetch_assoc($result);
    $score = $values['score'];

    if($score > moves)
    {
      $puzzle = "UPDATE puzzle set moves='moves' WHERE uname='$username'";

      mysqli_query($db , $puzzle);
    }*/

    

		alert(' YOU ARE BRILLIANT \n\n NO OF MOVES IS :'+ moves);	

    

    //session_start();

    <?php

    $db = mysqli_connect("localhost","root","","project");

    $username = $_SESSION['username'];

    $qur = "SELECT moves as score from puzzle where uname='$username'";
    $result = mysqli_query($db , $qur);
    $values = mysqli_fetch_assoc($result);
    $score = $values['score'];

    //$score1 = $_SESSION['moves'];

    //if($score == 50)
    {
        $puzzle = "UPDATE puzzle set moves='$moves' WHERE uname='$username'";
        mysqli_query($db , $puzzle);
    }

    ?>  

    if(getmoves==0)
      document.getElementById("bmoves").value=moves;
    else if(getmoves >= moves)
      document.getElementById("bmoves").value=moves;
		else
      document.getElementById("bmoves").value=getmoves;

    //var score = document.getElementById("moves").value;

    //$_SESSION['moves'] = score;

		moves=0;

    document.getElementById("moves").value = moves;

    random();
		
	}   

	
}

</script>

  
</head>
<BODY onload="random()">

<FORM METHOD='POST' ACTION="">

<table>

<font size="10" color="red"> INSTRUCTIONS:</font> <br>

<hr>

<font size="3" color="black">

THIS IS A BRAIN GAME.IN THIS THERE ARE 9 BOXES IN WHICH EACH BOX HAVE THERE OWN VALUE(1 TO 8) RESPECTIVELY,AND ONE 				  BOX HAS NO VALUE.<br><br>
	
YOU HAVE TO ARRANGE THE VALUES IN AN ASCENDING ORDER BY USING THE BOX WHICH HAS NO VALUE.<br><br>

YOU HAVE TO CLICK THE BOX WHICH HAS AN VALUE TO IT,IN SUCH A WAY THAT THE NULL VALUE GETS THE VALUE OF WHICH,YOU CLICKED THE BOX<br><br>

THE VALUE WILL BE NULL IN THE BOX WHERE YOU CLICKED IT.  NOW START THE GAME.

<br>

<hr>

</font>

</table>

<CENTER>

<table rows=1 columns=2>
  <tr>
  
    <td>
      <TABLE ROWS=3 COLUMNS=3 >
      <TR>
          <TD> <INPUT TYPE = "BUTTON" VALUE="1" class="button" name="1" onclick="myFunction1()" id="demo1"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="2" class="button" name="2" onclick="myFunction2()" id="demo2"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="3" class="button" name="3" onclick="myFunction3()" id="demo3"> </TD>
      </TR>

      <TR>
          <TD> <INPUT TYPE = "BUTTON" VALUE="  " class="button" name="4" onclick="myFunction4()" id="demo4"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="4" class="button" name="5" onclick="myFunction5()" id="demo5"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="5" class="button" name="6" onclick="myFunction6()" id="demo6"> </TD>
      </TR>

      <TR>
          <TD> <INPUT TYPE = "BUTTON" VALUE="6" class="button" name="7" onclick="myFunction7()" id="demo7"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="7" class="button" name="8" onclick="myFunction8()" id="demo8"> </TD>
          <TD> <INPUT TYPE = "BUTTON" VALUE="8" class="button" name="9" onclick="myFunction9()" id="demo9"> </TD>
      </TR>
      </TABLE>
    </td>

    <td>
      <h4>SCORES </h4>
      <table>
        <tr>
          <td> <h4> <font color="black"> BEST MOVES: </font> </h4> </td>
          <td> <input type="button" name="bmoves" value="0" id="bmoves" class="look"> </td>
        </tr>
        <tr>
          <td> <h4> <font color="black"> NO OF MOVES: </font> </h4> </td>
          <td> <input type="button" name="moves" value="0" id="moves" class="look"> </td>
        </tr>
      </table>
    </td>

  </tr>
</table>

</CENTER>

</FORM>
</BODY>
</HTML>
