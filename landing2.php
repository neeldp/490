<?php session_start();
require 'header.php';
?>
<!DOCTYPE html>
<!-- This file is used for the login screen of the CS 490 SEC. 003 Group 8 Project -->
<html lang = "en">
	<head>
        	<title> USER </title>
       		<meta charset = "utf-8" />
	</head>
    
	<body>
       	<h1> <b> USER </h1>
		<nav>
        	<ul>
            	<li><a href="create_Post.php">Create post</a></li>
            	<li><a href="sendMessage.php">Send a Message.</a></li>
				<li><a href="inbox.php">Inbox</a></li>
            	<li><a href="index.php">logout</a></li>
        	</ul>
    	</nav>
		<?php
			$conn = connect_db();
			$sql = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
			if($sql->num_rows > 0){
				while($row = $sql->fetch_assoc())
				{
					echo $row['time']."<br>";
					echo $row['user']." <br>";
					echo $row['text']."<br>";
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";
				}
			}
		?>
	</body>
</html></DOCTYPE>