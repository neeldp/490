<?php require 'header.php'; require 'db_key.php';?>
<style>
    .index{
        background:linear-gradient(#2C3E50,#000000)  
    }
    html {
        height: 100%;
    }
    body {
        height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background:linear-gradient(#2C3E50,#212e3c,#161f28,#0f151b,#000000)  
    }
</style>

<body class = "index"> 

    <div class = "container">
        <img class = "loginLogo" src="transparentTreble2.png" alt="Treble Logo"/>
        <form method = 'POST' action = 'backend.php' > 
            <div>
                <input class= 'form-control w-25' type="text" name="username"><br>
                <input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off">
            </div> 
            <br><button class = 'button-login' type="submit" name="login" value= 'login' class="submit">Login</button>
        </form>	
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
