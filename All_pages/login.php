<?php

   require 'config.php';
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" href="stylelogin.css">
</head>
<body style="background-color: #bdc3c7;">
    <div id="main-wrapper">
    	<center>
    		<h2>Login Form</h2>
    	</center>

    	<form class="myForm" action="login.php" method="post">
    		<label class = "labelsCSS">Username:</label><br>
    		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required /><br>
    		<label class = "labelsCSS">Password:</label><br>
    		<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
    		<div class = "actionButton">
	    		<input class = "buttonCSS" name="login" type="submit" id="login_btn" value="Login"/>
	    		<a style = "width:25%" href="register.php"><input style = "width: 100%" type="button" id="register_btn" value="Register"/></a>
	    	</div>
    	</form>
    	<?php
    	if(isset($_POST['login']))
    	{
    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		$sql= "SELECT user_id,user_name,password FROM USER WHERE user_name='$username' AND password='$password'"; 
    		$result = $conn->query($sql);
    		if ($result->num_rows > 0) {
    			//valid
    			$_SESSION['username']=$username;
    			header('location:mainPageLoggedIn2.php?username='.$username);
    		}
    		else{
    			//invalid
    			echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
    		}
    	}
    	?>
    	
    </div>
</body>
</html>
