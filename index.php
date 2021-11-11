<?php require 'header.php'; require 'db_key.php';?>

<div class="scene">
    <div class="card">
        <div class="login_Style">
            <div class = "form-container">
                <form method = 'POST' action = 'backend.php' >
                    <h1 class = "title"> Sign in to !Twitter </h1> <br>
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