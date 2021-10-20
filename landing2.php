<?php session_start();
require 'header.php';
require 'db_key.php';
require 'nav.php';
?>

<!-- This file is used for the login screen of the CS 490 SEC. 003 Group 8 Project -->
<html lang = "en">
	<head>
        	<title> USER </title>
       		<meta charset = "utf-8" />
	</head>
    
	<body>	
		<form method="POST" action='searchresults.php'>
			<h3> Search for a post </h3>
			<div class='form-group'>
				<label>Search:</label>
				<input class= 'form-control w-25' type="text" name="to"><br><br>
			</div>	
			<button class = 'btn btn-outline-info' type="submit" name="search" value= 'search' class="search">Search</button>
		</form>
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
	</body>
</html></DOCTYPE>