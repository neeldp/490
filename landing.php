<?php    
    session_start();
    require 'header.php';
    require 'nav.php';
    require 'db_key.php';
?>
<body>
	<?php
	if($_SESSION['isAdmin'] == 1){
		echo "<form method='POST' action='backend.php'>";
		echo "<h3>". "Delete A Post". "</h3>";
		echo "<div class='form-group'>";
		echo "<label>"."Delete:"."</label>";
		echo "<input class= 'form-control w-25' type='text' name='admin'>"."<br>"."<br>";
		echo "</div>";	
		echo "<button class = 'btn btn-outline-info' type='submit' name='adminbtn' value= 'message' class='adminbtn'>"."Admin"."</button>";
		echo "</form>";
	}else{
		echo "<br>";
	}

	?>
	<!-- Timeline Code --> 
	<h1> My Timeline </h1> 
	<div class = "timeline">
	
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