<?php  
require_once 'db_key.php'; 
 
// If file upload form is submitted 
session_start();
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
         
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    }
    
    
    $username = $_SESSION['username'];   
    $conn = connect_db();
    $sql = "Select users.username From users Where username = '$username'";
    echo $sql;
    $sql = $conn->query($sql);
    $sql = $sql->fetch_assoc();  
}
 
// Display status message 
echo $statusMsg; 
?>