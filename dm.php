<?php
if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){
        $sender = $_SESSION['username'];
        $receiver = "test";
        $text_message = $_POST['message'];
        $sender = mysqli_real_escape_string($conn, $sender);
        $receiver = mysqli_real_escape_string($conn, $receiver);
        $text_message = mysqli_real_escape_string($conn, $text_message);
        
        $sql = "INSERT INTO `dm_table`(`sender`, `reveiver`, `text_message`) VALUES ('$sender','$receiver','$text_message')"; #All new members are default USERS, admins added manually. 
        if($conn->query($sql) == TRUE){
            echo(" SUCCESSFUL");
        }
        
        
    }
}
?>