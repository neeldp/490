<?php

if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $username = mysqli_real_escape_string($conn, $username);
        $passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $sql = $conn->query($sql);
        if($sql){
            $sql = $sql->fetch_assoc();
            if(password_verify($password, $sql['password'])){
                session_start();
                $_SESSION['username'] =$username;
                echo 'Congratulations';
                header('location: landing.php');
            }else{
                header("refresh:2;url=index.php");
                echo 'incorrect password';
                exit();
            }
        } 
    }
}
?>
