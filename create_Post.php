<?php require 'header.php';
require 'nav.php';
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('b7d9baca79b6424597551d19d5fd02cf','6b988bb0c7ae4cf58013ff29e6ce5a26','https://login490.herokuapp.com');

$api = new SpotifyWebAPI\SpotifyWebAPI();
$session -> requestCredentialsToken();
$accessToken = $session -> getAccessToken();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api -> setAccessToken($accessToken);

echo $response;
?>   
<body>
	<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		</form>
	</div>

<?php require 'header.php';
require 'nav.php';
?>   
<body>
	<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		</form>
	</div>
 main
</body></html>
