<?php require 'header.php'; require 'db_key.php';?>

<body class = "nonScrollable">
<div class="scene">
    <div class="card">
        <div class="login_Style">
            <div class = "form-container">
                <form method = 'POST' action = 'backend.php' >
                    <img class = "loginLogo"
			 src="transparentTreble2.png"
			 alt="Treble Logo"
		    />
                    
                    <!--<h1 class = "title"> Welcome to Treble! </h1> <br>-->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
