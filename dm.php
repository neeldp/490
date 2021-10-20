<?php
    require 'db_key.php';
    $conn = connect_db();
    if(isset($_POST['submitMsg'])){
        $from = $_SESSION['username'];
        $to = "test";
        $msg = $_POST['message'];

        $sql = "INSERT INTO dm_table ('sender','receiver','text_message') VALUES ('$from','$to','$msg')";
        if($conn->query($sql)==TRUE){
            echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
?>