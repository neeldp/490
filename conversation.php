<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$NAME = $_GET["name"];
$_SESSION['get'] = $NAME;
//echo 'Conversation with ' . htmlspecialchars($_GET["name"]) . '!';
?>


<body>
    <div class="inbox_style" id="fresh">
        <?php
           $conn = connect_db();
           $usr = $_SESSION['username'];

           $sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE (`receiver` = '{$usr}' OR `receiver` = '{$NAME}')  AND (`sender` = '{$NAME}' OR `sender` = '{$usr}')";
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
        </div>
        <div class ="form-container message">
            <form method='POST' action ='backend.php'>
                <div class='form-group'>
                    <label>Message:</label>
                    <input class= 'form-control w-25' type="text" name="message">
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="replyMsg" value= 'message' class="replyMsg">Message</button>
            </form>
        </div> 
        
    <script>
        $(document).ready(function()
        {
            function refresh(){ 
                $( "#here" ).load(window.location.href + " #here" );
            }

            setInterval(function()
            {
                refresh()
            }, 1000); 
        })
    </script> 
</body>
