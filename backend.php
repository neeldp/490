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
                
                $_SESSION['username'] =$username;
                $_SESSION['isAdmin'] =$isAdmin;
                #echo 'Congratulations';
                header('location: landing.php');
            }else{
                header('location: index.php');
                #header("refresh:2;url=index.php");
                #echo 'incorrect password';
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
        $sql = "INSERT into `posts` (`text`, `image`, `time`, `user`) VALUES ('$post_Text', '$imgContent', NOW(), '$username')";
        $sql = $conn->query($sql);
        if(!$sql){
            die("Invalid ". mysqli_error($conn));
        }
        header("location: landing2.php");
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
        header("location: inbox.php");
    }
    
    if(isset($_POST['adminbtn'])){
        $adminTerm = $_POST['admin']; 
        $result = "DELETE FROM `comments` WHERE (`post_ID` = 'posts.id')";
        $result = $conn->query($result);
        $sql = "DELETE FROM `posts` WHERE (`user` LIKE '%$adminTerm%' OR `text` LIKE '%$adminTerm%')";
        //echo $adminTerm;
        $sql = $conn->query($sql);
        header('location: landing.php');
    }

    if(isset($_POST['commentbtn'])){
        $username = $_SESSION['username'];
        $text = $_POST['comment']; 
        $post_ID = $_POST['post_ID'];
        //var_dump($_POST);
        $sql = "INSERT INTO `comments`(`name`,`text`,`date`, `post_ID`) VALUES ('$username','$text', NOW(), '$post_ID')";
        $result = $conn->query($sql);
        header('location: landing2.php');
        //echo "$post_ID";
        
    }


} 

?>