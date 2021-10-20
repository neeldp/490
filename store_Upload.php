<?php  
require_once 'db_key.php'; 
 
// If file upload form is submitted 
session_start();

if(isset($_POST["create_Post"])){ 

    $post_Text = $_POST["post_Text"];

    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())");
        }
    }
    $username = $_SESSION['username'];
    $conn = connect_db();
    $sql = "INSERT INTO `posts`(`id`,`text`, `image`, `time`, `user`) VALUES (,'$post_Text','$imgContent',NOW()), '$username')";
    $sql = $conn->query($sql);
    $sql = $sql->fetch_assoc();        
}
 
// Display status message 
echo $statusMsg; 
?>