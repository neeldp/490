<?php session_start();
require 'header.php';
require "db_key.php";
require 'nav.php';
?>

<body>
    <div class="inbox_style">
        <table>
            <tr>
                <th>Message</th>
                <th>User</th>
            </tr>
            <?php
                $conn = connect_db();
                $usr = $_SESSION['username'];
                $sql = "SELECT sender,text_message,receiver FROM dm_table WHERE `receiver` = '$usr'";
                $result = $conn->query($sql);
                if($result -> num_rows > 0){
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
                        echo "<tr><td>" . $row['text_message'] . "</td><td>" . $row['sender'] . "</td></tr>";
                    }
                    echo "</table>";
                } 
                else { echo "0 results"; }
                $conn->close();  
            ?>
        </table>
        <?php
            if($_POST){
                require 'db_key.php';
                $conn = connect_db();
                if(isset($_POST['submitMsg'])){
                    $sender = mysqli_real_escape_string($conn,$_POST['username'] );
                    $receiver = mysqli_real_escape_string($conn,$_POST['to']);
                    $text_message = mysqli_real_escape_string($conn, $_POST['message']);
                    $sql = "INSERT INTO 'dm_table'('sender','text_message','receiver') VALUES ('$sender','$text_message','$receiver')";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("Invalid ". mysql_error());
                    }
                }
            }
        ?>
    </div>
</body>

