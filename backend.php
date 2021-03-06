<?php

if($_POST){
    require 'db_key.php';
    $conn = connect_db();
    session_start();
    if(isset($_POST['register']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);    
        $username = mysqli_real_escape_string($conn, $username);
        $passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);
        $sql = "Select users.username From users Where username = '$username'";
        $sql = $conn->query($sql);
        $sql = $sql->fetch_assoc();
        if($sql){
            header('location: /register.php');
            exit();
        }else{
            $sql = "INSERT INTO `users`(`username`, `password`, `isAdmin`) VALUES ('$username','$passwordHashed','0')"; #All new members are default USERS, admins added manually. 
            $sql = $conn->query($sql);
        }
        if($sql){
            echo "Registration succesful. You may <a href= '/'>login</a> now";
            header('location: index.php');
        }
    }   
    else if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $username = mysqli_real_escape_string($conn, $username);
        $passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $sql = $conn->query($sql);
        if($sql){
            $sql = $sql->fetch_assoc();
            $isAdmin = $sql['isAdmin'];
            if(password_verify($password, $sql['password'])){
                if(strlen($username) == 0){
                    header('location: index.php');
                }else{
                    $_SESSION['username'] =$username;
                    $_SESSION['isAdmin'] = $isAdmin;
                    header('location: landing.php');
                }
            }else{
                header('location: index.php');
                exit();

            }
        } 
    }
    

    if(isset($_POST['create_Post'])){
        $status = $statusMsg = '';
        if(isset($_POST["create_Post"])){ 
            $status = 'error';
            $post_Text = $_POST["post_Text"];

            if(!empty($_FILES["img"]["name"])) { 
                // Get file info 
                $fileName = basename($_FILES["img"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                
                // Allow certain file formats 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['img']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
                
                }
            }
            
            //else{ 
            //    $statusMsg = 'Please select an image file to upload.'; 
            //}
            
        
        $username = $_SESSION['username']; 
        $songID = $_SESSION['songID'];
        $sql = "INSERT into `posts` (`text`, `image`, `time`, `user`,`spotID`) VALUES ('$post_Text', '$imgContent', NOW(), '$username','$songID')";
        $sql = $conn->query($sql);
        if(!$sql){
            die("Invalid ". mysqli_error($conn));
        }
        header("location: landing.php");
        $sql = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
        if($sql->num_rows > 0){
            while($row = $sql->fetch_assoc())
            {
                echo $row['time']."<br>";
                echo $row['user']." <br>";
                echo $row['text']."<br>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'."<br>";
            }
        }
        }    
    }

    if(isset($_POST['submitMsg'])){

        $sender = $_SESSION['username'];
        $receiver = $_POST['to'];
        $text_message =  $_POST['message'];
        $sql = "INSERT INTO `dm_table`(`sender`,`text_message`,`receiver`) VALUES ('$sender','$text_message','$receiver')";
        $result = $conn->query($sql);
        if(!$result){
            die("Invalid ". mysqli_error($conn));
        }
        header("Location: conversation.php?name=".$receiver);
    }
    
    if(isset($_POST['replyMsg'])){
        $sender = $_SESSION['username'];
        $receiver = $_SESSION['get'];
        $text_message =  $_POST['message'];
        $sql = "INSERT INTO `dm_table`(`sender`,`text_message`,`receiver`) VALUES ('$sender','$text_message','$receiver')";
        $result = $conn->query($sql);
        if(!$result){
            die("Invalid ". mysqli_error($conn));
        }
        $query = http_build_query($_GET);
        header("Location: conversation.php?name=".$receiver); 
        }


    //if(isset($_POST['adminbtn'])){
    //    $adminTerm = $_POST['admin']; 
        //$result = "DELETE FROM `comments` WHERE (`post_ID` = 'posts.id')";
        //$result = $conn->query($result);
    //    $sql = "DELETE FROM `posts` WHERE (`user` LIKE '%$adminTerm%' OR `text` LIKE '%$adminTerm%')";
        //echo $adminTerm;
    //    $sql = $conn->query($sql);
    //    header('location: landing.php');
    //}

    if(isset($_POST['commentbtn'])){
        $username = $_SESSION['username'];
        $text = $_POST['comment_timeline']; 
        $post_ID = $_POST['post_ID'];
        //var_dump($_POST);
        $sql = "INSERT INTO `comments`(`name`,`text`,`date`, `post_ID`) VALUES ('$username','$text', NOW(), '$post_ID')";
        $result = $conn->query($sql);
        //$isAdmin = $sql['isAdmin'];
        header('location: landing.php');
        //echo "$post_ID";
        
    }
    
    if(isset($_POST['commentPro'])){
        $username = $_SESSION['username'];
        $text = $_POST['comment_profile']; 
        $post_ID = $_POST['pID'];
        //var_dump($_POST);
        $sql = "INSERT INTO `comments`(`name`,`text`,`date`, `post_ID`) VALUES ('$username','$text', NOW(), '$post_ID')";
        $result = $conn->query($sql);
        //$isAdmin = $sql['isAdmin'];
        header('location: profile.php');
        //echo "$post_ID";
        
    }

    if(isset($_POST['followbtn'])){
        $follower = $_SESSION['username'];
        $conn = connect_db();
		$result = $conn->query("SELECT id FROM users WHERE `username` = '{$follower}'");
		$row = mysqli_fetch_array($result);
        //the user in the session is the follower
		$follower_id = $row['id'];
        //the person we will follow is the user
        $user = $_POST['user'];

        $result = $conn->query("INSERT INTO `followers_table`(`user`, `follower_id`) VALUES ('$user', '$follower_id')");
        header('location: landing.php');
    }
    if(isset($_POST['deletebtn'])){
        $conn = connect_db();
        $id = $_POST['del'];
        $sql = "DELETE FROM `posts` WHERE `id` = '{$id}'";
		$result = $conn->query($sql);
		//$row = (mysqli_fetch_array($result);
        header('location: landing.php');
    }

    if(isset($_POST['deleteButton'])){
        $conn = connect_db();
        $id = $_POST['del_post'];
        $sql = "DELETE FROM `posts` WHERE `id` = '{$id}'";
		$result = $conn->query($sql);
		//$row = (mysqli_fetch_array($result);
        header('location: profile.php');
    }

    if(isset($_POST['searchbtnsong'])){
        $searchTerm = $_POST['searchSong'];
        header('location: create_Post.php?song=' . "$searchTerm");

    }

    if(isset($_POST['searchbtn'])){
        $searchTerm = $_POST['search'];
        header('location: searchresults.php?search=' . "$searchTerm");
    }

    if(isset($_POST['follow'])){
        $follower = $_SESSION['username'];
        $conn = connect_db();
		$result = $conn->query("SELECT id FROM users WHERE `username` = '{$follower}'");
		$row = mysqli_fetch_array($result);
        //the user in the session is the follower
		$follower_id = $row['id'];
        //the person we will follow is the user
        $user = $_POST['user'];

        $result = $conn->query("INSERT INTO `followers_table`(`user`, `follower_id`) VALUES ('$user', '$follower_id')");
        header('location: searchresults.php?search=' . "$user");
    }

    //search results
    if(isset($_POST['unfollow'])){
        //$follower = $_SESSION['username'];
        $id = $_POST['id'];
        $user = $_POST['username'];

        $conn = connect_db();
		$result = $conn->query("DELETE FROM followers_table WHERE `id` = '{$id}'");

        header('location: searchresults.php?search=' . "$user");
    }
    if(isset($_POST['comment'])){
        $username = $_SESSION['username'];
        $text = $_POST['text']; 
        $post_ID = $_POST['post_ID'];
        $user = $_POST['userPost'];
        //var_dump($_POST);
        $sql = "INSERT INTO `comments`(`name`,`text`,`date`, `post_ID`) VALUES ('$username','$text', NOW(), '$post_ID')";
        $result = $conn->query($sql);
        //$isAdmin = $sql['isAdmin'];
        header('location: searchresults.php?search=' . "$user");
        //echo "$post_ID";
        
    }

    //timeline
    if(isset($_POST['unfollowbtn'])){
        //$follower = $_SESSION['username'];
        $id = $_POST['id'];
        //echo $id;
        $user = $_POST['username'];

        $conn = connect_db();
		$result = $conn->query("DELETE FROM followers_table WHERE `id` = '{$id}'");

        header('location: landing.php');
    }

    //following.php

    if(isset($_POST['unfollowButton'])){
        //$follower = $_SESSION['username'];
        $id = $_POST['id'];
        $user = $_POST['name'];

        $conn = connect_db();
		$result = $conn->query("DELETE FROM followers_table WHERE `id` = '{$id}'");

        header('location: following.php');
    }

} 
//if($_GET){
   // prequire 'db_key.php';
    //if(!empty($_GET['d'])){
      //  $del = html_entity_decode($_GET['d']);
        //$del = (int)$del;
       // echo $del;
        //$conn = connect_db();
        //$sql = "DELETE FROM `posts` WHERE (`id` = '{$del}' )";

        //$sql = $conn->query($sql);
        //header('location: landing.php');
   // }
//
?>