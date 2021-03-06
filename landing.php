<?php  require 'header.php'; require 'nav.php'; require 'db_key.php'; ?>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <?php $value = getenv("SPOTIFY_TOKEN"); echo "<p>". $value."</p>"; ?> 
            <?php
                $user = $_SESSION['username']; $conn = connect_db(); $result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
                $row = mysqli_fetch_array($result); $user_id = $row['id'];
                   
                $sql = $conn->query("SELECT distinct `user` FROM followers_table WHERE follower_id = '{$user_id}'"); $arr = array(); $counter = 0;
                if($sql->num_rows > 0){
                    while($row = mysqli_fetch_array($sql)){
                        $arr[$counter] = $row['user'];
                        $counter++;
                    }
                }

                $list = implode("' ,'", $arr);
                if (count($arr) == 0){
                    $sql_query = $conn->query("SELECT * FROM `posts` Where `user` = '{$user}' ORDER BY `time` DESC");
                }else{
                    $sql_query = $conn->query("SELECT * FROM `posts` Where `user` IN ('{$list}') or `user` = '{$user}' ORDER BY `time` DESC");
                }
            
                    
                while($row = mysqli_fetch_array($sql_query)){
                    echo '<div class="card mb-4">';
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                            
                        echo '<div class="card-body">';
                            echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                            echo "<p class='card-text'>". $row['text']."</p>";
                                    
                            echo "<p>". $row['user']."</p>";
                            $name = $row['user'];
                            if ($name != $user){
                                $result = $conn->query("SELECT id FROM followers_table WHERE follower_id = '{$user_id}' AND `user` = '{$name}'");
                                $record = mysqli_fetch_array($result);
                                echo '<form method="POST" action="backend.php">
                                        <input type="hidden" name="id" value="'. $record['id'].'" />
                                        <input type="hidden" name="username" value="'. $row['user'].'" />
                                        <button id = followerButton class = "btn btn-outline-info" type="submit" name="unfollowbtn" value= "unfollow">Following</button>
                                    </form>';
                            }
                            
                            $userP = $row['user'];
                            $result = $conn->query("SELECT id FROM `followers_table` WHERE `user` = '{$userP}' AND `follower_id` = '{$user_id}'");
                            $record = mysqli_fetch_array($result);
                            $id = $row['id'];
                            if($_SESSION['isAdmin']==1){
                                echo '<form method="POST" action="backend.php">
                                        <input type="hidden" name="del" value="'. $id.'" />
                                        <button id = "delete-button"  class = "btn btn-outline-info" type="submit" name="deletebtn" value= "delete">Delete</button>
                                    </form>';
                            }

                            $id = $row['id'];
                            $sql = $conn->query("SELECT * FROM comments Where post_ID = '{$id}'");
                            if($sql->num_rows > 0){
                                echo "<br>";
                                echo '<div class ="card">';
                                    echo '<div class="card-body">';
                                        echo "<p>".'Comments'."</p>";
                                        while($r = mysqli_fetch_array($sql)){       
                                            echo '<p class="card-text">';
                                                echo $r['name'].": <sp>";
                                                echo $r['text']."<br>";
                                        } 
                                        echo '</p><br/>'; /* border div */
                                    echo '</div>';
                                echo '</div>';
                            }
                            
                            echo '<form method="POST" action="backend.php">';
                                    echo '<div class ="form-group">';
                                        echo '<label>Comment:</label>';
                                        echo '<input class= "form-control w-25" type="text" name="comment_timeline">';
                                        echo '<input type="hidden" name="post_ID" value="'. $row['id'].'" />';
                                    echo '</div>';
                                    echo '<button class = "btn btn-outline-info" type="submit" name="commentbtn" value= "post_Comment">Add your own</button>';
                                echo '</form>'; 
                        echo "</div>";
                    echo "</div>";
                    echo "<br><br>";
                }
                
            $conn->close();     
            ?> 
        </div>
         <!--  Side widgets -->
        <div class="col-lg-2" style='overflow-y: auto;' >
             <!-- Search widget -->
            <br>
            <div style="position:fixed">
             <!-- <div class="card mb-2">
                <div class="card-header">Search</div>
                <div class="card-body">

                    <div class="input-group">
                        <form method="POST" action='backend.php'>
                        <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="submit" name='searchbtn'>Go!</button>
                    </div>
                    </form>
                </div>
                </div> -->

             <div class = "card mb-4">
                <div class="card-header">You Might Like</div>
                <?php
                        $user = $_SESSION['username']; 
                        $conn = connect_db(); 
                        $result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
                        $row = mysqli_fetch_array($result); 
                        $user_id = $row['id'];
                    
                        $sql = $conn->query("SELECT distinct `user` FROM followers_table WHERE follower_id = '{$user_id}'");
                        $arr = array(); 
                        $counter = 0;
                        if($sql->num_rows > 0){
                            while($row = mysqli_fetch_array($sql)) {
                                $arr[$counter] = $row['user'];
                                $counter++;
                            }
                            //$arr[$counter] = $user;
                            //var_dump($arr);
                        } 
                        $list = implode("' ,'", $arr);
                        $sql_query = $conn->query("SELECT * FROM `users` Where `username` NOT IN ('{$list}') and username != '{$user}' ORDER BY Rand() LIMIT 3 ");
                        echo '<div class ="card-body">';
                            if($sql_query->num_rows > 0){
                                while($row = mysqli_fetch_array($sql_query)){
                                    echo $row['username'];    
                                    echo '<form method="POST" action="backend.php">
                                    <input type="hidden" name="user" value="'. $row['username'].'" /> 
                                    <button id = followerButton class = "btn btn-outline-info" type="submit" name="followbtn" value= "follower">+ Follow</button>
                                    </form>';
                                    echo '<br>';   
                                }
                            }
                        echo '</div>';
                    ?>
            </div> 
         </div>
     </div>     
    </div>
</div>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html> 
