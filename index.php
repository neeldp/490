<?php require 'header.php';
require 'db_key.php';
?>
<!DOCTYPE html>
<!-- This file is used for the login screen of the CS 490 SEC. 003 Group 8 Project -->
<html lang = "en">    
	<body>
       	<h1> <b> Group 8 Login Screen </h1>

	<form method = 'POST' action = 'backend.php' >
		<h1> Sign in </h1> 
		<div class="form-group">
			<label>Username : </label>
			<input class= 'form-control w-25' type="text" name="username"><br><br>

			<label>Password :</label>
			<input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
		</div> 
		<button class = 'btn btn-outline-info' type="submit" name="login" value= 'login' class="submit">Login</button>
	</form>	
    </body>
</html>