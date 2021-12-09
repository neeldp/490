<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>

<div class='container'>
	<div class='row'> 
		<div card ="col-lg-7">
			<br>
			<div class='card mb-4'>
				<div class='card-body'>
                    <h1> Followers </h1> 
                    <a href="profile.php" class="buttonClass">Profile</a>
                    <ul class='list-group'>
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
                                
                                $list = implode("' ,'", $arr);
                                $sql_query = $conn->query("SELECT `username` FROM `users` Where `id` IN ('{$list}')");
                                while($row = mysqli_fetch_array($sql_query))
                                {
                                    echo "<li class='list-group-item'>". $row['username']."</li>";

                                }

                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>