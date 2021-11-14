<!DOCTYPE html>
<html>

<script>
  var client_id = 'b7d9baca79b6424597551d19d5fd02cf';
  var client_secret = '6b988bb0c7ae4cf58013ff29e6ce5a26';

  var authOptions = {
    url: 'https://accounts.spotify.com/api/token',
    headers: {
      'Authorization': 'Basic ' + (new Buffer(client_id + ':' + client_secret).toString('base64'))
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
</script> 

<head>
    <title> Not Twitter </title>
    <meta charset = "utf-8" />
    <link rel="stylesheet" href="indexstyles.css" media="screen">
    <link rel="shortcut icon" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.hash_function', 'whirlpool');
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);
session_start();
?>