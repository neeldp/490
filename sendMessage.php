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
		<!-- Send Messages -->
		<div class ="form-container message">
			<form method='POST' action ='backend.php'>
				<h1> Send a Message </h1>
				<div class='form-group'>
					<label>To:</label>
					<input class= 'form-control w-25' type="text" name="to"><br><br>
					<label>Message:</label>
					<input class= 'form-control w-25' type="text" name="message"><br><br>
                </div>
				<button class = 'btn btn-outline-info' type="submit" name="submitMsg" value= 'message' class="submitMsg">Message</button>
			</form>
		</div>	
		
    </body>
</html>