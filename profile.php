<?php
require 'header.php';
require 'nav.php';
require 'db_key.php';
?>


<body>
    <div class = "profile">
    <?php
    $user = $_SESSION['username'];
    echo $user; 
    
    $conn = connect_db();
	$result = $conn->query("SELECT * FROM posts WHERE username = '{$user}' ORDER BY `time` DESC");
	if($result->num_rows > 0){
	    while($row = mysqli_fetch_array($result))
		{
		    echo "<div class='posts'>";
			echo '<img class="post_image" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
			echo "<p class='ptime'>". $row['time']."</p>";
        }
    }
    ?>
    <div>
<body>
        
