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
		<h1 class="tmln"> searchResults</h1> 
		<div>
			<?php
            $conn = connect_db();
            if(isset($_POST['search'])){
                $searchTerm = $_POST['search']; 
				echo $searchTerm;
            
				$result = $conn->query("SELECT * FROM posts WHERE `user` LIKE '%$searchTerm%' OR `text` LIKE '%$searchTerm%'");
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
            }
				$conn->close();
			?>
		</div>
	</body>
</html></DOCTYPE>