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
        
            $searchTerm = $_POST['search']; 

			echo $searchTerm;
            
			$result = $conn->query("SELECT * FROM posts WHERE (`user` LIKE '%$searchTerm%' OR `text` LIKE '%$searchTerm%')");
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