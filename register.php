<?php
require 'header.php';
?>
<body>
<div class = 'container'>
<div>
<div><h1>Register your Account</h1></div>
</div>
<form action = 'backend.php' method = 'POST'>
<div class = 'p-5 m-5'>
<div class="form-group">
<label>Username:</label>
<input class = 'form-control w-50' type="text" name="username" required>
<label>Password:</label>
<input class = 'form-control w-50' type="password" name="password" required>
<div class ='text-center mt-3 w-50'>
<button class = 'btn btn-outline-info' type = 'submit' value = 'submit' name= 'register'>Submit</button>
</div>
</div>
</div>
</form>
</div>
</body>
</html>