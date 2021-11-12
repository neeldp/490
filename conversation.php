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

           $sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE `receiver` = '{$usr}' AND `sender` = '{$NAME}'";
           $result = $conn->query($sql);
           if($result -> num_rows > 0){
               while($row = mysqli_fetch_array($result)){
                   echo "<p> " . $row['text_message'] . "</br>" . $row['sender'] . "<br><br>" . "</p>";
                }
            }
            echo "<p> Should be current users sent messages </p>"
            $sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE `receiver` = '{$NAME}' AND `sender` = '{$usr}'";
            $result = $conn->query($sql);
            if($result -> num_rows > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<p> " . $row['text_message'] . "</br>" . $row['sender'] . "<br><br>" . "</p>";
                 }
             }
        $conn->close();
        ?>
        <div class ="form-container message">
            <form method='POST' action ='backend.php'>
                <div class='form-group'>
                    <label>To:</label>
                    <input class= 'form-control w-25' type="text" name="to">
                    <label>Message:</label>
                    <input class= 'form-control w-25' type="text" name="message">
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="submitMsg" value= 'message' class="submitMsg">Message</button>
            </form>
        </div>    
    </div>
</body>
