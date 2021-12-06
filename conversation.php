<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
$NAME = $_GET["name"];
$_SESSION['get'] = $NAME;
//echo 'Conversation with ' . htmlspecialchars($_GET["name"]) . '!';
?>

<body class = "nonScrollable">
    <script> 
    $(document).ready(function(){
    setInterval(function(){
        $("#fresh").load(window.location.href + " #fresh" );
    }, 1000);
    });
    </script>
    
    <div id="inbox_container_style" class="inbox_container_style">
        <div class="inbox_style" id="fresh">
            <?php
               $conn = connect_db();
               $usr = $_SESSION['username'];

               $sql = "SELECT sender,text_message,receiver,id FROM dm_table WHERE (`receiver` = '{$usr}' OR `receiver` = '{$NAME}')  AND (`sender` = '{$NAME}' OR `sender` = '{$usr}')";
               $result = $conn->query($sql);
               if($result -> num_rows > 0){
                   while($row = mysqli_fetch_array($result)){
                       echo "<p> " . $row['text_message'] . "</br> <b>" . $row['sender'] . "</b><br><br>" . "</p>";
                    }
                }
            $conn->close();
            ?>
            <script>
             document.getElementbyId("fresh").scrollTop =  document.getElementbyId("fresh").scrollHeight;   
            </script>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
