<?php 
require 'header.php';
require 'db_key.php';
require 'nav.php';
?>

<!-- This file is used for the login screen of the CS 490 SEC. 003 Group 8 Project -->
    
	<body>	
		<h1> Search Results:</h1> 
		<div>
			<?php
            $conn = connect_db();
			//echo 'hi';
			$user = $_SESSION['username'];
            $searchTerm = $_GET['search']; 
			$result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
        	$row = mysqli_fetch_array($result);
			$user_id = $row['id'];
			 

			//echo "$searchTerm";
			$sql = $conn->query("SELECT * FROM users WHERE `username` = '{$searchTerm}' AND `username` != '{$user}'");
			if($sql->num_rows > 0){
				while($row = mysqli_fetch_array($sql)){

					echo $row['username'];

					$result = $conn->query("SELECT id FROM `followers_table` WHERE `user` = '{$searchTerm}' AND `follower_id` = '{$user_id}'");

					if($result->num_rows > 0)
					{
						$record = mysqli_fetch_array($result);
						echo '<form method="POST" action="backend.php"> <b>
					<input type="hidden" name="id" value="'. $record['id'].'" /> </b>
					<input type="hidden" name="username" value="'. $row['username'].'" />
					<button class = "btn btn-outline-info" type="submit" name="unfollow" value= "following">Following</button>
					</form>';

					}
					else
					{
						echo '<form method="POST" action="backend.php">
					<input type="hidden" name="user" value="'. $row['username'].'" />
					<button class = "btn btn-outline-info" type="submit" name="follow" value= "follower">Follow</button>
					</form>';

					}
						
					

					echo '<sp><sp>';

				}
				
			}
            
			$result = $conn->query("SELECT * FROM posts WHERE (`user` LIKE '%$searchTerm%' OR `text` LIKE '%$searchTerm%') ORDER BY `time` DESC");
			//$result = $conn->query("SELECT * FROM posts WHERE (`user` LIKE 'jake' OR `text` LIKE 'jake') ORDER BY `time`");
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='posts'>";
					
					
					echo "<p class='puser'>". $row['user']."</p>";
                    			/*
					$userP = $row['user'];  
					$result = $conn->query("SELECT id FROM `followers_table` WHERE `user` = '{$userP}' AND `follower_id` = '{$user_id}'");
					$record = mysqli_fetch_array($result);
					*/

    
					if($_SESSION['isAdmin']==1){
						echo "<a href=backend.php?d='" . $row['id'] . "'" . ">" . "Delete post" . "</a>";
					}	    
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';	
					echo "<p class='ptext'>". $row['text']."</p>";	
					echo "<p class='ptime'>". $row['time']."</p>";
					echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
					
                    
					    
					/*
					echo $row['time']."<br>";
					echo $row['user']." <br>";
					echo $row['text']."<br>";
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";
					echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
					*/
						
					$id = $row['id'];
						
					$sql = $conn->query("SELECT * FROM comments Where `post_ID` = '{$id}'");
					
					if($sql->num_rows > 0){
						while($r = mysqli_fetch_array($sql))
						{
							echo $r['date']."<br>";
							echo $r['name'].":";
							echo $r['text']."<br><br>";
							
						}
					}

					echo '<form method="POST" action="backend.php">
					<div class="form-group">
						<label>Comment:</label>
						<input class= "form-control w-25" type="text" name="text"><br><br>
						<input type="hidden" name="post_ID" value="'. $row['id'].'" />
						<input type="hidden" name="userPost" value="'. $row['user'].'" />
					</div>	
					<button class = "btn btn-outline-info" type="submit" name="comment" value= "post_Comment">Comment</button>
				</form>';
					echo "</div>";
					echo "<br><br>";
					echo "</div>";
					echo "<br><br>";
				}
			}
		$conn->close();
			?>
		</div>
	</body>
</html></DOCTYPE>
