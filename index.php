<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
</head>
<body>
		<h1  style="padding: 10px;text-align: center;margin-top: 40px;font-size: 2.5rem;color: #150e56;font-family: 'Roboto Condensed', sans-serif;">Expense Tracker</h1>

	<div class="container">
		<div style="margin-left:440px;margin-bottom: 110px;" class="login-content">
        <form role="form" action="login.php" method="post" name="login">
				<h2 class="title">Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>

           		   <div class="div">
           		   		<input type="text" class="input" name="userid" placeholder="Username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    <i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">

           		    	<input style="width: 92%;" id="myInput" type="password" class="input" name="pswrd" placeholder="Password" required>
						   <img id="open" src="icons/eye.svg" style="cursor: pointer; height: 22px;width: 22px;float: right;margin-top: 4%;display: none;" onclick="myFunction()"alt="">
						   <img id="closed" src="icons/eye-slash.svg" style="cursor: pointer; height: 22px;width: 22px;float: right;margin-top: 4%;" onclick="myFunction1()"alt="">
						   <script>
							   function myFunction() {
								document.getElementById("open").style.display="none";
							document.getElementById("closed").style.display="block";
							var x = document.getElementById("myInput");
							if (x.type === "text") {
							  x.type = "password";
							}
						  }
						  function myFunction1() {
							document.getElementById("open").style.display="block";
							document.getElementById("closed").style.display="none";
							var x = document.getElementById("myInput");
							if (x.type === "password") {
							  x.type = "text";
							}
						  }
						   </script>
            	   </div>
            	</div>
            	 <input type="submit" class="btn" name="btn" value="Login" >
               <a href="register.php"><b>New user? Register now!</b></a>

            </form>
        </div>

    </div>


</body>

</html>
