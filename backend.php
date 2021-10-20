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
            
            else{ 
                $statusMsg = 'Please select an image file to upload.'; 
            }
            
        
        $username = $_SESSION['username'];   
        $sql = "INSERT into `posts` (`text`, `image`, `time`, `user`) VALUES ('$post_Text', '$imgContent', NOW(), '$username')";
        $sql = $conn->query($sql);
        if(!$sql){
            die("Invalid ". mysqli_error($conn));
        }
        //header('location: landing2.php');

        $sql = $conn->query("SELECT * FROM posts ORDER BY `time` DESC");
        $sql=mysqli_fetch_array($sql);
        if($sql->num_rows > 0){
            while($row = $sql->fetch_assoc())
            {
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $sql['image'] ).'"/>'
            }
        }
        //$sql=mysqli_fetch_array($sql);
        //echo '<img src="data:image/jpeg;base64,'.base64_encode( $sql['image'] ).'"/>';


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
        echo "BIG POSS";
        
     
        

    }
    

}   
?>