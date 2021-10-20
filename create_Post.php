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
			<form method = "post" action="backend.php"> <!-- enctype= "multipart/form-data">--> 
			<textarea class = "status" name = "status" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
		</div>
		
		
		<form action="enctype= multipart/form-data">
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<!-- <input type="submit"> -->
		</form>
		
		<br>
		
		<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		
    	</body>
</html>