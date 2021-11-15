<?php require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'b7d9baca79b6424597551d19d5fd02cf',
    '6b988bb0c7ae4cf58013ff29e6ce5a26',
    'https://login490.herokuapp.com/redir.php'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();

$_SESSION['accesstoken'] = $accessToken; 

header('Location: create_Post.php');

die(); ?> 