<?php require 'header.php';
require 'nav.php';
require 'db_key.php';
$NAME = $_GET["song"];
$songID = $_SESSION['songID']; 
$_SESSION['song'] = $NAME;
?>   
<body>
<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea>
			<br>
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
		</form>
	
<form method="POST" action='backend.php'>
	<div class='form-group'>
		<label>Search for a Song on Spotify:</label>
		<input class= 'form-control w-25' type="text" name="searchSong">
	</div>	
	<sp><button type="submit" name="searchbtnsong" value= 'searchbtn' class="searchbtnsong">Search</button> <sp>
	<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
</form>
</div>
	<?php 
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
		
	?> 
	
</body></html>
