<?php 
require 'header.php';
require "db_key.php";
require 'nav.php';
?>

<body>
    <div class="inbox_style">
       <a href= sendMessage.php> Send a new message. </a> 
       <ul> <tr> <th> Conversation Name </th></tr> 
        <?php 
        $conn = connect_db();
        $usr = $_SESSION['username'];
        $sql = "SELECT sender FROM dm_table WHERE receiver = '{$usr}'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td> <a> " . $row['sender']  . "</a></td></tr>";
             }
        }
         $conn->close();
        ?>
        </ul> 

    </div>
</body>