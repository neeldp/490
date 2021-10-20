<?php
if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){
        $from = $_SESSION['username'];
        $to = "test";
        $msg = $_POST['message'];
        $from = mysqli_real_escape_string($conn, $from);
        $to = mysqli_real_escape_string($conn, $to);
        $to = mysqli_real_escape_string($conn, $msg);
        $sql = "Select users.username From users Where username = '$from'";
        $sql = $conn->query($sql);
        $sql = $sql->fetch_assoc();
        if($sql){
            header('location: /direct_Messages.php');
            exit();
        }else{
            $sql = "INSERT INTO `dm_table`(`sender`, `reveiver`, `text_message`) VALUES ('$from','$to','$msg')"; #All new members are default USERS, admins added manually. 
            $sql = $conn->query($sql);
        }
        if($sql){
            echo "Registration succesful. You may <a href= '/'>login</a> now";
            header('location: index.php');
        }
    }
}
?>