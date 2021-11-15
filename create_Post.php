<?php require 'header.php';
require 'nav.php';
require 'vendor/autoload.php';
require 'db_key.php';
?>   
<body>
	<?php 
		require 'vendor/autoload.php';
		$conn = connect_db();

		$sql = "SELECT `ac` FROM `spotify`";
        $accessToken = $conn->query($sql);

		$api = new SpotifyWebAPI\SpotifyWebAPI();
		$api->setAccessToken($accessToken);

		// It's now possible to request data from the Spotify catalog
		print_r(
			$api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
		);
		header('Location: create_Post.php');
		die();
	?> 
	<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		</form>
	</div>
	<!-- <script>
		var client_id = 'b7d9baca79b6424597551d19d5fd02cf';
		var client_secret = '6b988bb0c7ae4cf58013ff29e6ce5a26';
		var buffer = new Buffer(); 
		var authOptions = {
			url: 'https://accounts.spotify.com/api/token',
			headers: {
			'Authorization': 'Basic ' + (buffer.from(client_id + ':' + client_secret).toString('base64'))
			},
			form: {
			grant_type: 'client_credentials'
			},
			json: true
		};

		request.post(authOptions, function(error, response, body) {
			if (!error && response.statusCode === 200) {
			var token = body.access_token;
			}
		});

		process.env.SPOTIFY_TOKEN = token;
		console.log(token);
	</script>  -->
</body></html>
