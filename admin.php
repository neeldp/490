<?php 
require 'header.php';
require 'db_key.php';
require 'nav.php';
if($_SESSION['isAdmin'] ==  0){
	header('location: landing.php');	
}
?>

<body>
	<!-- Admin Create User -->	
	<div class = "create_user">
		<h3> Create A User </h3>
			<form method = 'POST' action = 'backend.php' >
				<div class="">
					<label>Username : </label>
					<input class= 'form-control w-25' type="text" name="username"><br>
					<label>Password    :</label>
					<input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
				</div> 
				<br><button class = 'button-login' type="submit" name="register" value= 'login' class="register">Sign-up</button>
			</form>	
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html></DOCTYPE>