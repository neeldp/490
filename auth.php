<?php 
    require 'vendor/autoload.php';

    $session = new SpotifyWebAPI\Session(
        'b7d9baca79b6424597551d19d5fd02cf',
        '6b988bb0c7ae4cf58013ff29e6ce5a26'
    );
    
    $session->requestCredentialsToken();
    $accessToken = $session->getAccessToken();
    
    $conn -> connect_db(); 
    $sql = "INSERT INTO `spotify`(`AC`) VALUES ('$accessToken')";
    $sql = $conn->query($sql);

    header('Location: create_Post.php');
    die();
	?> 