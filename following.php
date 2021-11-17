<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>

<?php

    $user = $_SESSION['username'];
    $conn = connect_db();		
    $result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
    $row = mysqli_fetch_array($result);
	$user_id = $row['id'];

    $sql = $conn->query("SELECT distinct * FROM followers_table WHERE follower_id = '{$user_id}'");
    if($sql->num_rows > 0){
        while($row = mysqli_fetch_array($sql))
        {
            echo $row['user'];
            echo '<form method="POST" action="backend.php"> <b>
					<input type="hidden" name="id" value="'. $row['id'].'" /> </b>
					<input type="hidden" name="name" value="'. $row['user'].'" />
					<button class = "btn btn-outline-info" type="submit" name="unfollowButton" value= "following">Following</button>
					</form>';
            echo '<br>';
        
        }
    }

?>