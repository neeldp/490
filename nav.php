<?php require 'header.php';?>
<header>
			<nav>
				<ul>
                    <li><a href="landing.php">Timeline</a></li>
					<li><a href="create_Post.php">Create post</a></li>
					<li><a href="sendMessage.php">Send a Message.</a></li>
					<li><a href="inbox.php">Inbox</a></li>
					<li><a href="index.php">logout</a></li>
				<li>
				<!--Search Section --> 
				<div div class = "search_post">
					<form method="POST" action='searchresults.php'>
						<div class='form-group'>
							<label>Search:</label>
							<input class= 'form-control w-25' type="text" name="search">
						</div>	
						<sp><button class = 'button-login' type="submit" name="register" value= 'login' class="register">Search</button>
					</form>
				</div>
				</li>
				<?php if($_SESSION['isAdmin']==1){
						echo"<li>";
						echo "<a href='index.php'>"."logout"."</a>"; 
						echo "</li>";}?>
			</ul>
			</nav>
</header>