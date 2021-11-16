<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$songID = $_GET["id"];
$_SESSION['songID'] = $songID;
header('location: create_Post.php');
?>