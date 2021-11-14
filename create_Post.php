spotify_API_FIles
<?php require 'header.php';
require 'nav.php';
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
	'b7d9baca79b6424597551d19d5fd02cf',
	'6b988bb0c7ae4cf58013ff29e6ce5a26',
);

$session -> requestCredentialsToken();
$accessToken = $session -> getAccessToken();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api -> setAccessToken($accessToken);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://v1.nocodeapi.com/jake_nhan/spotify/CNRBKHbFlcgJPXzG/search?q=Sanctuary&type=track&perPage=5",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>'{}',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
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