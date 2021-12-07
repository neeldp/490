<?php    
    require 'header.php';
    require 'nav.php';
    require 'db_key.php';
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <?php $value = getenv("SPOTIFY_TOKEN"); echo "<p>". $value."</p>"; ?> 
            <?php /* Load php */
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
                        /* Picture */
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                        /* Content */
                        echo '<div class="card-body">';
                            /* Spotify */
                            echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
                            /* Description */
                            echo "<p class='card-title'>". $row['text']."</p>";
                            /* Username */        
                            echo "<p class='card-text>". $row['user']."</p>";
                            /* Following btn */
                            $name = $row['user'];
                            if ($name != $user){
                                $result = $conn->query("SELECT id FROM followers_table WHERE follower_id = '{$user_id}' AND `user` = '{$name}'");
                                $record = mysqli_fetch_array($result);
                                echo '<form method="POST" action="backend.php">
                                        <input type="hidden" name="id" value="'. $record['id'].'" />
                                        <input type="hidden" name="username" value="'. $row['user'].'" />
                                        <button id = followerButton class = "btn btn-outline-info" type="submit" name="unfollowbtn" value= "unfollow">Following</button>
                                    </form>';
                            } /* end following btn */
                            
                            /* Delete btn */
                            $userP = $row['user'];
                            $result = $conn->query("SELECT id FROM `followers_table` WHERE `user` = '{$userP}' AND `follower_id` = '{$user_id}'");
                            $record = mysqli_fetch_array($result);
                            $id = $row['id'];
                            if($_SESSION['isAdmin']==1){
                                echo '<form method="POST" action="backend.php">
                                        <input type="hidden" name="del" value="'. $id.'" />
                                        <button id = "delete-button"  class = "btn btn-outline-info" type="submit" name="deletebtn" value= "delete">Delete</button>
                                    </form>';
                            }/* End del btn */

                            /* Comments */
                            $id = $row['id'];
                            $sql = $conn->query("SELECT * FROM comments Where post_ID = '{$id}'");
                            /* Comments content */
                            if($sql->num_rows > 0){
                                echo "<p>".'Comments'."</p>";
                                echo '<div style="border-style:inset;border-top-style: dotted; border-right-style: solid; border-bottom-style: dotted; border-left-style: solid;">';
                                    while($r = mysqli_fetch_array($sql)){       
                                        echo '<p class = "card-text">';
                                            echo $r['name'].":<sp>";
                                            echo $r['text']."<br>";
                                        
                                    } 
                                    echo '</p>';
                                }/* End comments content  */
                                echo '</div>';/* border div */
                            /* Comment btn */
                            echo '<form method="POST" action="backend.php">';
                                    /* echo '<div class ="form-group">'; */
                                        echo '<label>Comment:</label>';
                                        echo '<input class= "form-control w-25" type="text" name="comment_timeline">';
                                        echo '<input type="hidden" name="post_ID" value="'. $row['id'].'" />';
                                    /* echo '</div>'; */
                                    echo '<button class = "btn btn-outline-info" type="submit" name="commentbtn" value= "post_Comment">Comment</button>';
                                echo '</form>'; /* end comment btn */
                        echo "</div>";/* end card body */
                    echo "</div>";/* end card */
                    echo "<br><br>";
                } /*end while */
                
            $conn->close();     
            ?> <!-- end load php -->
        </div>
        <!-- Side widgets-->
        <div class="col-lg-2" style='overflow-y: auto;' >
            <!-- Search widget-->
            <br>
            <div style="position:fixed">
            

           <!-- random followers goes here -->
        </div>  
     </div>          
    </div>
</div> <!-- end container div -->
    <!-- Timeline Code --> 
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html> 
