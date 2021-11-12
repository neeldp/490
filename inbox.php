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
        $sql = "SELECT sender FROM dm_table WHERE receiver = '{$usr}' or sender = '{$usr}'";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                if ($row['sender'] == $usr ){
                echo "<tr><td>".  "<a href='conversation.php?name=".$row['receiver'] . "'>" . $row['receiver']  . "</a></td></tr>";
                }else{
                    echo "<tr><td>".  "<a href='conversation.php?name=".$row['sender'] . "'>" . $row['sender']  . "</a></td></tr>";
                }
             }
        }
         $conn->close();
        ?>
        </ul> 

    </div>
</body>