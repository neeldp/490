<?php require 'header.php';
require 'nav.php';
?>   
<body>
	<div class = "post-body"> 
		<form action="backend.php" method="POST" enctype="multipart/form-data">
			<textarea class = "status" name = "post_Text" placeholder = "Write your post here!" rows="4" cols="50" maxlength = "300"autofocus></textarea> 
			<label for="img">Attach image:</label>
			<input type="file" id="img" name="img" accept="image/*">
			<button class = 'btn btn-outline-info' type="submit" name="create_Post" value= 'Post' class="submit">Post</button></form>
		</form>
	</div>
</body></html>