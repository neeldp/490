<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>


<body>
	<div class = "stats">

		<script>

			function following() {
				window.location.replace("following.php");
			}

			function followers() {
				window.location.replace("followers.php");
			}

		</script>

		<?php

			$conn = connect_db();
			$user = $_SESSION['username'];
        	$result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
        	$row = mysqli_fetch_array($result);
			$user_id = $row['id'];

			$sql_query = $conn->query("SELECT COUNT(*) FROM followers_table WHERE `follower_id` = '{$user_id}'");
			$row = mysqli_fetch_array($sql_query);
			//echo "$row[0]";
			//echo '<a href="following.php">following</a>';
			//echo "$row[0] ";
			echo '<label onclick="following()" class="followingPointer">'. $row[0].' Following</label>'; /* WHY DOESN'T THE ID WORK/MAKES THE FUNCTION STOP WORKING?? */
			//echo '<label onclick="following()">'. $row[0].' Following</label>';
			echo "\t\t\t\t";
			

			$sql = $conn->query("SELECT COUNT(*) FROM followers_table WHERE `user` = '{$user}'");
			$row = mysqli_fetch_array($sql);
			//echo "$row[0] ";
			echo '<label onclick="followers()" class="followerPointer">'. $row[0].' Followers</label>';

		?>
	</div>
	
	
	<div class = "timeline">
	<body>
		<div class="container">
    		<div class="row">
        		<div class="col-lg-7">
					
					<?php
						$conn = connect_db();
						$usr = $_SESSION['username'];
						$result = $conn->query("SELECT * FROM posts WHERE `user` = '{$usr}' ORDER BY `time` DESC");
						if($result->num_rows > 0){
							while($row = mysqli_fetch_array($result))
							{
								echo '<div class="card mb-4">';
									echo '<img class="post_image" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
									echo '<div class="card-body">';
										echo "<iframe src='https://open.spotify.com/embed/track/". $row['spotID'] . "'" . 'width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>';
										//echo "<p class='puser'>". $row['user']."</p>";
										echo "<p class='card-text'>". $row['text']."</p>";
										//echo "<p class='ptext'>". $row['text']."</p>";
										echo "<p class='ptime'>". $row['time']."</p>";
										$id = $row['id'];
										echo '<form method="POST" action="backend.php">
											<input type="hidden" name="del_post" value="'. $id.'" />
											<button id = "delete-button"  class = "btn btn-outline-info" type="submit" name="deleteButton" value= "delete">Delete</button>
											</form>';

										$id = $row['id'];
										$sql = $conn->query("SELECT * FROM comments Where post_ID = '{$id}'");

										if($sql->num_rows > 0){
											echo '<div class ="card">';
                                    			echo '<div class="card-body">';
                                        			echo "<p>".'Comments'."</p>";
														while($r = mysqli_fetch_array($sql))
														{
															echo '<p class="card-text">';
																echo $r['date']."<br>";
																echo $r['name'].":";
																echo $r['text']."<br><br>";

														}

													echo '</p><br/>'; /* border div */
												echo '</div>';
											echo '</div>';
										}
										echo '<form method="POST" action="backend.php">';
										echo '<div class ="form-group">';
										echo '<label>Comment:</label>';
										echo '<input class= "form-control w-25" type="text" name="comment_profile">';
										echo '<input type="hidden" name="pID" value="'. $row['id'].'" />';
										echo '</div>';
										echo '<button class = "btn btn-outline-info" type="submit" name="commentPro" value= "post_Comment">Comment</button>';
										echo '</form>';

									echo "</div>";
								echo "</div>";
								echo "<br><br>";
							}
						}
						$conn->close();
						?>
				</div>
				<div class="col-lg-2" style='overflow-y: auto;' >
             <!-- Search widget -->
            <br>
            <div style="position:fixed">
            	<div class = "card mb-4">
					<div class="card-header">Fans</div>
					<script>
						function following() {
							window.location.replace("following.php");
						}

						function followers() {
							window.location.replace("followers.php");
						}
					</script>

					<?php

						$conn = connect_db();
						$user = $_SESSION['username'];
						$result = $conn->query("SELECT id FROM users WHERE `username` = '{$user}'");
						$row = mysqli_fetch_array($result);
						$user_id = $row['id'];

						$sql_query = $conn->query("SELECT COUNT(*) FROM followers_table WHERE `follower_id` = '{$user_id}'");
						$row = mysqli_fetch_array($sql_query);
						//echo "$row[0]";
						//echo '<a href="following.php">following</a>';
						//echo "$row[0] ";
						echo '<label onclick="following()" class="followingPointer">'. $row[0].' Following</label>'; /* WHY DOESN'T THE ID WORK/MAKES THE FUNCTION STOP WORKING?? */
						//echo '<label onclick="following()">'. $row[0].' Following</label>';
						//echo "\t\t\t\t";
						

						$sql = $conn->query("SELECT COUNT(*) FROM followers_table WHERE `user` = '{$user}'");
						$row = mysqli_fetch_array($sql);
						//echo "$row[0] ";
						echo '<label onclick="followers()" class="followerPointer">'. $row[0].' Followers</label>';

					?>
				</div> 
			</div>
			</div>
		</div>
	</body>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body>
        
