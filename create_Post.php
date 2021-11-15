<?php require 'header.php';
require 'nav.php';
require 'db_key.php';
$NAME = $_GET["song"];
$_SESSION['song'] = $NAME;
?>   
<body>
<form method="POST" action='backend.php'>
	<div class='form-group'>
		<label>Search for a Song on Spotify:</label>
		<input class= 'form-control w-25' type="text" name="searchSong">
	</div>	
	<sp><button type="submit" name="searchbtnsong" value= 'searchbtn' class="searchbtnsong">Search</button>
</form>
	<?php 
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
		echo "<p>" . $accessToken . "</p>";
		
		

		$res = $api->search('hotel', ['track']);
		foreach($res->tracks->items as $track){
			echo "<a href='backend.php?id=". $track->id . "'>" . $track->name . "</a>" . '<br>';
		}
		echo "<p>" . $_SESSION["song"] . "</p>";
	?> 
	<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		</form>
	</div>

</body></html>
