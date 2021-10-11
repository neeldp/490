<?php require 'header.php';

?>

<div class="scene">
    <div class="card">
        <div class="card__face card__face--front">
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
                <div class="switch">
                    <br><br><h2> No Account? </h2>
                    <button class='button-register' >Sign-up</button>
                </div>
            </div>
        </div>
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
                    <br><button class = 'button-login' type="submit" name="login" value= 'login' class="submit">Login</button>
                </form>	
                <div class="switch">
                    <br><br><h2> No Account? </h2>
                    <button class='button-register' >Sign-up</button>
                </div>
            </div>
        </div>
    </div>
    
    <script> 
        var card = document.querySelector('.card'); 
         btn = document.querySelector('.button-register');
        btn.addEventListener('click', function () { card.classList.toggle('is-flipped');}); </script>
</div>