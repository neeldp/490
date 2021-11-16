<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>


<body>

	<div class = "stats">

		<?php

			$conn = connect_db();
			$user = $_SESSION['username'];
        	$result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
        	$row = mysqli_fetch_array($result);
			$user_id = $row['id'];

			$sql = $conn->query("SELECT COUNT(*) FROM followers_table WHERE `user` = '{$user}'");
			$row = mysqli_fetch_array($sql);
			print_r($row);
			//echo "$row";


		?>


	</div>


	<div class = "timeline">
		<h1> My Profile </h1> 
		<?php
			
			$conn = connect_db();
            $usr = $_SESSION['username'];
			$result = $conn->query("SELECT * FROM posts WHERE `user` = '{$usr}' ORDER BY `time` DESC");
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='posts'>";
					echo "<p class='puser'>". $row['user']."</p>";
					echo '<img class="post_image" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
					echo "<p class='ptext'>". $row['text']."</p>";
					echo "<p class='ptime'>". $row['time']."</p>";
					echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';

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
<body>
        
