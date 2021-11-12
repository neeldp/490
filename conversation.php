<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$NAME = $_GET['NAME'];
echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
?>
