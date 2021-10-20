<?php
if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){

        $sender = mysqli_real_escape_string($conn,$_POST['username'] );
        $receiver = mysqli_real_escape_string($conn,$_POST['to']);
        $text_message = mysqli_real_escape_string($conn, $_POST['message']);
        $sql = "INSERT INTO 'dm_table' VALUES ('$sender','$text_message','$receiver')";
        $result = $conn->query($sql)
        if(!$result){
            die("Invalid ". mysql_error())
        }
        echo "BIG POSS";
        
     
        
    }
}
?>