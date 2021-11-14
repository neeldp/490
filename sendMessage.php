<?php require 'header.php';
require 'nav.php';
?>

<!-- This file is used for creating a post for the CS 490 SEC. 003 Group 8 Simple Social Media Project -->

	<body>
	<div class ="form-container message">
            <form method='POST' action ='backend.php'>
                <div class='form-group'>
                    <label>To:</label>
                    <input class= 'form-control w-25' type="text" name="to">
                    <label>Message:</label>
                    <input class= 'form-control w-25' type="text" name="message">
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="submitMsg" value= 'message' class="submitMsg">Message</button>
            </form>
        </div>    
		
    </body>
</html>