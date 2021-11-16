<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$songID = $_GET["id"];
$_SESSION['id'] = $songID;
header('location: create_Post.php');
?>