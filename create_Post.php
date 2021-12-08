<?php require 'header.php';
require 'nav.php';
require 'db_key.php';
$NAME = $_GET["song"];
$songID = $_SESSION['songID']; 
$_SESSION['song'] = $NAME;
?>   
<body>
<div class='card mx-auto'>
	<div class='card-body'> 
		<div class='card mb-4'>
			<div class='card-body'> 
				<form action="backend.php" method="POST" enctype="multipart/form-data">   	
					<div class="form-group">
						<label>Search for a Song on Spotify:</label>
						<input class="form-control w-25" type="text" name="searchSong">
					</div>	
					<sp> <button type="submit" name="searchbtnsong" value="searchbtn" class="searchbtnsong">Search</button> <br> <br>
				</form>
				
				<?php
					if($_GET){ 
						echo"<div class ='card mx-auto'>";
						echo	"<div class ='card-body'>";
							//echo "<p>" . $_SESSION['songID'] . "</p>";
							require 'vendor/autoload.php';

							$session = new SpotifyWebAPI\Session(
								'b7d9baca79b6424597551d19d5fd02cf',
								'6b988bb0c7ae4cf58013ff29e6ce5a26',
								'https://login490.herokuapp.com/redir.php'
							);
							
							$api = new SpotifyWebAPI\SpotifyWebAPI();
							
							$session->requestCredentialsToken();
							$accessToken = $session->getAccessToken();
							
							// Set the code on the API wrapper
							$api->setAccessToken($accessToken);
							//echo "<p>" . $accessToken . "</p>";
							
							$res = $api->search($_SESSION["song"], ['track']);
							foreach($res->tracks->items as $track){
								echo "<a href='songredir.php?id=". $track->id . "'>" . $track->name . $track->artist . "</a>" . '<br>';
							}
						echo	"</div>";
					echo "</div>";	
					}
				?> 
				
				<form action="backend.php" method="POST" enctype="multipart/form-data"> 
					<label for="img">Attach image:</label><br>
					<input type="file" id="img" name="img" accept="image/*">  <br><br>
			
					<textarea class="status" name="post_Text" placeholder="Write your post here!"></textarea> 
					<br><br><button class="btn btn-outline-info" type="submit" name="create_Post" value="Post">Post</button> <br>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
</body></html>
