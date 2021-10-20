<?php
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){
        $from = $_SESSION['username'];
        $to = $_POST['to'] ;
        $msg = $_POST['message'];

        $sql = "INSERT INTO 'heroku_d39ddae7fbaabf5.dm_table'('sender','receiver','text_message') VALUES ('$from','$to','$msg')";
        if($conn->query($sql)==TRUE){
            echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
?>