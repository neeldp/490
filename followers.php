<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>

<?php

    $user = $_SESSION['username'];
    $conn = connect_db();		
    //$result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
    //$row = mysqli_fetch_array($result);
	//$user_id = $row['id'];

    $sql = $conn->query("SELECT distinct `id` FROM followers_table WHERE `user` = '{$user}'");
    if($sql->num_rows > 0){
        while($row = mysqli_fetch_array($sql))
        {
            echo $row['id'];
            echo '<br>';
        
        }
    }

?>