<?php require 'header.php';
require 'nav.php';
?>

<!-- This file is used for creating a post for the CS 490 SEC. 003 Group 8 Simple Social Media Project -->

	<body>
		<?php
		require header.php;
		if($_POST){
			require 'db_key.php';
			$conn = connect_db();
			if(isset($_POST['submitMsg'])){
				$sender = mysqli_real_escape_string($conn,$_POST['username'] );
				$receiver = mysqli_real_escape_string($conn,$_POST['to']);
				$text_message = mysqli_real_escape_string($conn, $_POST['message']);
				$sql = "INSERT INTO 'dm_table'('sender','text_message','receiver') VALUES ('$sender','$text_message','$receiver')";
				$result = $conn->query($sql);
				if(!$result){
					die("Invalid ". mysql_error());
				}
				}
			}
		?>	
		
    </body>
</html>