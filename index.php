<?php require 'header.php'; require 'db_key.php';?>

<body class = "nonScrollable">
<div class="scene">
    <div class="card">
        <div class="login_Style">
            <div class = "form-container">
                <form method = 'POST' action = 'backend.php' >
                    <img class = "loginLogo"
			 src="Treble_2_resized.png"
			 alt="Treble Logo"
		    />
                    
                    <h1 class = "title"> Welcome to Treble! </h1> <br>
                    <div class="form-group">
                        <label>Username : </label><br>
                        <input class= 'form-control w-25' type="text" name="username"><br>

                        <label>Password :</label><br>
                        <input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
                    </div> 
                    <br><button class = 'button-login' type="submit" name="login" value= 'login' class="submit">Login</button>
                </form>	
            </div>
        </div>       
    </div>   

</div>
</body>
