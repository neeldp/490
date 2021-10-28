<?php    
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    else if($_SESSION['isAdmin'] == 0){
        header('location: landing2.php');
    }
    require 'header.php';
    require 'nav.php';
    require 'db_key.php';
?>
<body>
<div class="card__face card__face--back">
            <div class = "form-container">
                <form method = 'POST' action = 'backend.php' >
                    <h1 class = "title"> Sign up to !Twitter </h1> <br>
                    <div class="form-group">
                        <label>Username : </label><br>
                        <input class= 'form-control w-25' type="text" name="username"><br>
                        <label>Password :</label><br>
                        <input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
                    </div> 
                    <br><button class = 'button-login' type="submit" name="register" value= 'login' class="register">Sign-up</button>
                </form>	
                <div class="switch">
                    <br><br><h2> Have an account? </h2>
                    <button class='button-register1' >Login</button>
                </div>
            </div>
        </div>
	</body>
 </html> 