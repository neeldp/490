<?php require 'header.php';
?>

<!DOCTYPE html>
<!-- This file is used for creating a post for the CS 490 SEC. 003 Group 8 Simple Social Media Project -->
<html lang = "en">
	<head>
        	<title> Post </title>
       		<meta charset = "utf-8" />
	</head>
    
	<body>
		<div class = "post-body"> 
			<form action="store_Upload.php">
				<textarea class = "status" name = "status" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
				
				<label for="img">Attach image:</label>
				<input type="file" id="img" name="img" accept="image/*">

				<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
			</form>
		</div>
		<br>

    	</body>
</html>