<?php    
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    else if($_SESSION['isAdmin'] == 0){
        header('location: landing2.php');
    }
    require 'header.php';
?>
<body> <h1> "ADMIN" </h1> </body> </html> 