<?php    
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    else if($_SESSION['isAdmin'] == 0){
        header('location: landing2.php');
    }
    require 'header.php';
    require 'nav.php';
    require 'db_key.php';
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

	<!--Search Section --> 
	<div div class = "search_post">
		<form method="POST" action='searchresults.php'>
			<h3> Search for a post </h3>
			<div class='form-group'>
				<label>Search:</label>
				<input class= 'form-control w-25' type="text" name="search"><br><br>
			</div>	
			<br><button class = 'button-login' type="submit" name="register" value= 'login' class="register">Search</button>
		</form>
	</div>

	<!--Delete Post --> 
    <form method="POST" action='backend.php'>
		<h3> Delete A Post </h3>
		<div class='form-group'>
			<label>Delete:</label>
				<input class= 'form-control w-25' type="text" name="admin"><br><br>
		</div>	
		<button class = 'btn btn-outline-info' type="submit" name="adminbtn" value= 'message' class="adminbtn">Admin</button>
	</form>
	
	<!-- Admin Timeline Code --> 
	<h1 class="tmln"> My Timeline </h1> 
	<div>
		<?php
			$conn = connect_db();
			$result = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='posts'>";
					echo $row['time']."<br>";
					echo $row['user']." <br>";
					echo $row['text']."<br>";
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";
					echo "</div>";
					echo "<br><br>";
				}
			}
			$conn->close();
		?>
	</div>
</body></html> 