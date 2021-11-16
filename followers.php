<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>

<?php

    $user = $_SESSION['username'];
    $conn = connect_db();

    $sql = $conn->query("SELECT distinct `id` FROM followers_table WHERE `user` = '{$user}'");
    if($sql->num_rows > 0){
        while($row = mysqli_fetch_array($sql))
        {
            $id = $row['id'];
            //echo $id;
            $result = $conn->query("SELECT `username` FROM `users` WHERE `id` = '{$id}' LIMIT 1");
            $record = mysqli_fetch_array($result);
            $follower = $record[0];
            echo "$follower";
            echo '<br>';
        
        }
    }

?>