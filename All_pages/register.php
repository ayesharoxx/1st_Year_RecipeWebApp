<?php
	require 'config.php' ;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="stylesheet" href="stylelogin.css"> 
</head>
<body style="background-color: #bdc3c7;">
    <div id="main-wrapper">
    	<center>
    		<h2>Registration Form</h2>
    	</center>

    	<form class="myForm" action="register.php" method="post">
    		<label>Username:</label><br>
    		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
    		<label>Password:</label><br>
    		<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
    		<label>Confirm Password:</label><br>
    		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
    		<div class = "actionButton">
	    		<input class = "buttonCSS" name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/>
	    		<a style = "width: 25%" href="login.php"><input style = "width: 100%;" type="button" id="back_btn" value="Login"/></a>
	    	</div>
    	</form>

    	<?php
    		if(isset($_POST['submit_btn']))
    		{
    		
    			$username = $_POST['username'];
    			$password = $_POST['password'];
    			$cpassword = $_POST['cpassword'];
    			//echo '<script type="text/javascript"> alert("Sign up button clicked")</script>';

    			if($password==$cpassword)
    			{
    				$sql= "SELECT user_id,user_name,password FROM USER WHERE user_name='$username'"; 
    				$result = $conn->query($sql);
    				if ($result->num_rows > 0) {
    				 
    					//there is a user with the same username
    				 	echo '<script type="text/javascript"> alert("User already exists... try another username")</script>';
    				 //output data of each row
    					// while($row = $result->fetch_assoc()) {
    					// 	echo "id: " . $row["user_id"]. " - email: " . $row["user_name"]. "<br>";
    					// }
    				}
    				else{
    				 	$sql= "INSERT INTO USER(user_name,password) VALUES('$username','$password')";
    				 	$result = $conn->query($sql);
    				    if ($result)
    				 	{	
    						echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login")</script>';
    				 	}
    				 	else
    				 	{
    				 		echo '<script type="text/javascript"> alert("Error!")</script>';
    				 	}
    		 		 }
    			}
    

    				// $query_run= mysqli_query($conn,$query);
    				// echo mysqli_num_rows($query_run);

    				// if(mysqli_num_rows($query_run)>0)
    				// {
    				// 	//there is a user with the same username
    				// 	echo '<script type="text/javascript"> alert("User already exists... try another username")</script>';
    				// }
    				// else{
    				// 	$query= "insert into user(user_name,password) values('$username','$password')";
    				// 	$query_run= mysqli_query($conn,$query);

    				// 	if($query_run)
    				// 	{	
    				// 		echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login")</script>';
    				// 	}
    				// 	else
    				// 	{
    				// 		echo '<script type="text/javascript"> alert("Error!")</script>';
    				// 	}
    		// 		// }
    		// 	}
    		// }
    			else{
    				echo '<script type="text/javascript"> alert("Password and Confirm Password do not match")</script>';

    			}


    			

    		
    	}

    	?>
    	
    </div>
</body>
</html>