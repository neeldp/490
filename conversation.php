<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$NAME = $_GET["name"];
//echo 'Conversation with ' . htmlspecialchars($_GET["name"]) . '!';
?>

<body>
    <div class="inbox_style">
        <?php
           $conn = connect_db();
           $usr = $_SESSION['username'];

           $sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE (`receiver` = '{$usr}' OR `receiver` = '{$NAME}')  AND (`sender` = '{$NAME}' OR `sender` = '{$usr}') ORDER BY id";
           $result = $conn->query($sql);
           if($result -> num_rows > 0){
               while($row = mysqli_fetch_array($result)){
                   echo "<p> " . $row['text_message'] . "</br>" . $row['sender'] . "<br><br>" . "</p>";
                }
            }
            //echo "<p> Should be current users sent messages </p>";
            //$sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE `receiver` = '{$NAME}' AND `sender` = '{$usr}'";
            //$result = $conn->query($sql);
            //if($result -> num_rows > 0){
            //    while($row = mysqli_fetch_array($result)){
            //        echo "<p> " . $row['text_message'] . "</br>" . $row['sender'] . "<br><br>" . "</p>";
            //     }
            // }
        $conn->close();
        ?>
        <div class ="form-container message">
            <form method='POST' action ='conversation.php'>
                <div class='form-group'>
                    <label>Message:</label>
                    <input class= 'form-control w-25' type="text" name="message">
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="submitMsg" value= 'message' class="submitMsg">Message</button>
            </form>
        </div> 
        <?   
        if(isset($_POST['submitMsg'])){
            $sender = $_SESSION['username'];
            $receiver = $NAME;
            $text_message =  $_POST['message'];
            $sql = "INSERT INTO `dm_table`(`sender`,`text_message`,`receiver`) VALUES ('$sender','$text_message','$receiver')";
            $result = $conn->query($sql);
            if(!$result){
                die("Invalid ". mysqli_error($conn));
            }
            header("location: $_SERVER['PHP_SELF']");
            }?>
    </div>
</body>
