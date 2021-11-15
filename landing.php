<?php    
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

	<div class = "follow list">

		<?php

		$user = $_SESSION['username'];
		
		$result = $conn->query("SELECT * FROM users WHERE `username` != '{$user}'");
		if($result->num_rows > 0){
			while($row = mysqli_fetch_array($result))
			{
				echo $row['username'];
				//echo '<button type="button>Follow"</button>';

				//echo '<button onclick="myFunction()>"Follow"</button>';
				
				echo '<form method="POST" action="backend.php">';
				echo '<button class = "btn btn-outline-info" type="submit" name="followbtn" value= "follower">Follow</button>';
				echo '</form>';
				
			}
		}

		?>
	</div>	

	<!-- Timeline Code --> 
	<div class = "timeline">
		<h1> My Timeline </h1> 
		<?php
			$value = getenv("SPOTIFY_TOKEN");
			echo "<p>". $value."</p>";
		?>
		<?php
			$conn = connect_db();
			$result = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='posts'>";
					echo "<p class='puser'>". $row['user']."</p>";
					echo '<img class="post_image" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
					echo "<p class='ptext'>". $row['text']."</p>";
					echo "<p class='ptime'>". $row['time']."</p>";

					$id = $row['id'];
					$sql = $conn->query("SELECT * FROM comments Where post_ID = '{$id}'");

					if($sql->num_rows > 0){
						while($r = mysqli_fetch_array($sql))
						{
							echo $r['date']."<br>";
							echo $r['name'].":";
							echo $r['text']."<br><br>";

						}
					}
					echo '<form method="POST" action="backend.php">';
					echo '<div class ="form-group">';
					echo '<label>Comment:</label>';
					echo '<input class= "form-control w-25" type="text" name="comment">';
					echo '<input type="hidden" name="post_ID" value="'. $row['id'].'" />';
					echo '</div>';
					echo '<button class = "btn btn-outline-info" type="submit" name="commentbtn" value= "post_Comment">Comment</button>';
					echo '</form>';

					echo "</div>";
					echo "<br><br>";
				}
			}
			
			$conn->close();
		?>
	</div>
	
	<iframe src="https://open.spotify.com/embed/playlist/0WZVzE2o5qYnCiEfIDA4rD?utm_source=generator" width="100%" height="80" frameBorder="0"
	allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
	</iframe>
</body></html> 