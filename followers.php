<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>

<?php

    $user = $_SESSION['username'];
    $conn = connect_db();

    $sql = $conn->query("SELECT distinct `follower_id` FROM followers_table WHERE `user` = '{$user}'");
    $counter = 0;
    $arr = array();
    if($sql->num_rows > 0){
        while($row = mysqli_fetch_array($sql))
        {
            $id = $row['follower_id'];
            //echo $id;
            //$result = $conn->query("SELECT `username` FROM `users` WHERE `id` = '{$id}'");
            //$record = mysqli_fetch_array($result);
            //$follower = $record[0];
            $arr[$counter] = $id;
            $counter++;

            //echo "$record";
            //echo '<br>'; 
        }
        print_r($arr);
        $list = implode("' ,'", $arr);
        $sql_query = $conn->query("SELECT `username` FROM `users` Where `id` IN ('{$list}')");
        while($row = mysqli_fetch_array($sql_query))
        {
            echo $row['username']."<br>";

        }

    }

?>