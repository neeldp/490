<?php require 'header.php';
require 'db_key.php';
?>
<!DOCTYPE html>
<!-- This file is used for the login screen of the CS 490 SEC. 003 Group 8 Project -->
<html lang = "en">    
	<body>
		<div class="containter" id="containter">
			<div class="form-container sign-up">
				<form action="#">
					<h1>Create Account</h1>
					<span>Make a Username</span>
					<input type="text" placeholder="Username" />
					<input type="password" placeholder="Password" />
					<button>Sign Up</button>
				</form>
			</div>
			<div class ="form-container sign-in">
				<form method = 'POST' action = 'backend.php' >
					<h1> Sign in to !Twitter </h1> 
					<div class="form-group">
						<label>Username : </label>
						<input class= 'form-control w-25' type="text" name="username"><br><br>

						<label>Password :</label>
						<input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
					</div> 
					<button class = 'btn btn-outline-info' type="submit" name="login" value= 'login' class="submit">Login</button>
				</form>	
			</div>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>