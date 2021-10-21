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
				<input class= 'form-control w-25' type="text" name="search"><br><br>
			</div>	
			<button class = 'btn btn-outline-info' type="submit" name="searchbtn" value= 'message' class="search">Search</button>
		</form>
		<h1 class="tmln"> My Timeline </h1> 
		<div>
			<?php
				$conn = connect_db();
				$result = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
				if($result->num_rows > 0){
					while($row = mysqli_fetch_array($result))
					{
						//echo '<div class="posts" >';
						echo "<div id ='". $row['id'] ."'>";
						echo $row['time']."<br>";
						echo $row['user']." <br>";
						echo $row['text']."<br>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";

						$id = $row['id'];
						var_dump($id);
						
						$sql = $conn->query("SELECT * FROM comments Where `postID` = '{$id}'");
						//Where postID = '$id'
						//ORDER BY `date` DESC 
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
					}
				}
				$conn->close();
			?>
		</div>
	</body>
</html></DOCTYPE>