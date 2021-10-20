<?php
if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){

        $sender = mysqli_real_escape_string($_POST['username'], $conn);
        $receiver = mysqli_real_escape_string($_POST['to'], $conn);
        $text_message = mysqli_real_escape_string($_POST['message'], $conn);
        $sql = "INSERT INTO 'dm_table' VALUES ('$sender','$text_message','$receiver')";
        $conn -> query($sql);
        echo "BIG POSS";
        
     
        
    }
}
?>