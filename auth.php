<?php require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'b7d9baca79b6424597551d19d5fd02cf',
    '6b988bb0c7ae4cf58013ff29e6ce5a26'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

// Store the access token somewhere. In a database for example.

// Send the user along and fetch some data!
header('Location: create_Post.php');
die();
?> 