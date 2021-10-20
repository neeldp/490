<?php require 'header.php';
        require "db_key.php"
?>
<style>
th, td {
  padding: 15px;
  text-align: left;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  border-right: 1px solid #ddd;
  border-left: 1px solid #ddd;
  margin-left: auto;
  margin-right: auto;
}
</style>
<body>
    <div class="form-container">
        <table>
            <tr>
                <th>Message</th>
                <th>User</th>
            </tr>
            <?php
                $conn = connect_db();
                $sql = "SELECT sender,text_message,receiver FROM dm_table WHERE `receiver = $_SESSION['username']`";
                $result = $conn->query($sql);
                if($result -> num_rows > 0){
                    while($row = $result->fetchassoc()){
                        echo "<tr><td>" . $row["text_message"] . "</td><td>" . $row["sender"] . "</td></tr>"
                    }
                    echo "</table>";
                } 
                else { echo "0 results"; }
                $conn->close();
            ?>
        </table>
    </div>
</body>
