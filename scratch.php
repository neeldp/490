<!-- <div class = "card mb-4">
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
            </div> -->
<!-- search function thing below -->
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
            </div>-->