<?php require 'header.php'; require "db_key.php"; require 'nav.php'; ?>

<body>
<div class='container'>
	<div class='row'> 
		<div card ="col-lg-7">
			<br>
			<div class='card mb-4'>
				<div class='card-body'>
                    <h1> Inbox </h1> 
                    <ul class='list-group'>
                        <?php 
                            $conn = connect_db();
                            $usr = $_SESSION['username'];
                            $sql = "SELECT receiver FROM dm_table WHERE sender = '{$usr}' UNION SELECT sender FROM dm_table WHERE receiver = '{$usr}'";
                            $result = $conn->query($sql);
                            if($result -> num_rows > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<li class='list-group-item'>".  "<a href='conversation.php?name=".$row['receiver'] . "'>" . $row['receiver']  . "</a></li>";
                                }
                            }
                            $conn->close();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


