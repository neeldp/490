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
			 

			//echo "$searchTerm";
			$sql = $conn->query("SELECT * FROM users WHERE `username` = '{$searchTerm}' AND `username` != '{$user}'");
			if($sql->num_rows > 0){
				while($row = mysqli_fetch_array($sql)){

					echo $row['username'];
						
					echo '<form method="POST" action="backend.php">
					<input type="hidden" name="user" value="'. $row['username'].'" />
					<button class = "btn btn-outline-info" type="submit" name="followSearch" value= "follower">Follow</button>
					</form>';

					echo '<sp><sp>';

				}
				
			}
            
			$result = $conn->query("SELECT * FROM posts WHERE (`user` LIKE '%$searchTerm%' OR `text` LIKE '%$searchTerm%') ORDER BY `time`");
			//$result = $conn->query("SELECT * FROM posts WHERE (`user` LIKE 'jake' OR `text` LIKE 'jake') ORDER BY `time`");
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='posts'>";
					echo $row['time']."<br>";
					echo $row['user']." <br>";
					echo $row['text']."<br>";
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";
						
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
						<input class= "form-control w-25" type="text" name="comment"><br><br>
						<input type="hidden" name="post_ID" value="'. $row['id'].'" />
					</div>	
					<button class = "btn btn-outline-info" type="submit" name="commentbtn" value= "post_Comment">Comment</button>
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